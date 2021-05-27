<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    private $_api_context;

    /**
     * PaypalController constructor.
     * @param $_api_context
     */
    public function __construct()
    {
        $paypa_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypa_conf['client_id'], $paypa_conf['secret']));
        $this->_api_context->setConfig($paypa_conf['settings']);
    }

    public function postPayment()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $items = array();
        $subtotal = 0;
        $subtotalIva = 0;
        $carrito = Session::get('carrito');
        $currency = 'MXN';

        foreach ($carrito as $producto) {
            $item = new Item();
            $ivaItem = $producto->precio * .16;
            $item->setName($producto->nombre)
                ->setCurrency($currency)
                ->setDescription($producto->description)
                ->setQuantity($producto->cantidad)
                ->setPrice(($producto->precio + $ivaItem));
            $items[] = $item;
            $subtotalIva += $producto->cantidad * $producto->precio;
        }
        $iva = $subtotalIva * .16;
        $subtotal = $subtotalIva + $iva;


        $item_list = new ItemList();
        $item_list->setItems($items);

        $details = new Details();

        $details->setSubtotal($subtotal)->setShipping(0);

        $total = $subtotal;

        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal($total)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Pedido en FastStore');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))
            ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try{
            $payment->create($this->_api_context);
        }catch (\Paypal\Exception\PayPalConnectionException $ex){
            if (Config::get('app.debug')){
                echo "Exception: ".$ex->getMessage().PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            }else{
                die('Ups! Algo salio mal');
            }

        }

        foreach ($payment->getLinks() as $link){
            if ($link->getRel() == 'approval_url'){
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)){
            return \Redirect::away($redirect_url);
        }

        return  \Redirect::route('carrito')
            ->with('mensaje', 'Ups! Error desconocido');

    }

    public function getPaymentStatus()
    {

        $payment_id = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');
        $payerId = Input::get('PayerID');
        $token = Input::get('token');


        if (empty($payerId) || empty($token)){

            return \Redirect::route('inicio')
                ->with('mensaje', 'Hubo un problema al intentar pagar con Paypal');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);


        if ($result->getState() == 'approved'){

            $this->saveOrder();
                Session::forget('carrito');
                return  \Redirect::route('inicio')
                    ->with('mensaje', 'Compra realizada de forma correcta');
        }

        return \Redirect::route('inicio')
            ->with('mensaje', 'La compra fue cancelada');



    }

    protected function saveOrder(){
        $subotal = 0;
        $carrito = Session::get('carrito');

        $envio = 5;

        foreach ($carrito as $producto){
            $subotal += $producto->cantidad * $producto->precio;
        }

        $order = Order::create([
          'subtotal' => $subotal,
          'envio' => $envio,
          'user_id' => Auth::user()->id
        ]);

        foreach ($carrito as $producto){
            $this->saveOrderItem($producto, $order->id);
        }

    }

    protected function saveOrderItem($producto, $order_id){
        OrderItem::create([
           'precio' => $producto->precio,
           'cantidad' => $producto->cantidad,
           'idproducto' => $producto->idproducto,
            'order_id' => $order_id
        ]);
    }

}
