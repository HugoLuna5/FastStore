<?php

namespace App\Http\Controllers\Admin;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $pedidos = Order::orderBy('created_at', 'desc')->paginate(15);

        return view('tienda.admin.pedidos.index', compact('pedidos'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Order::find($id);
        return view('tienda.admin.pedidos.show', compact('pedido'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pedido = Order::find($id);

        if ($pedido != null){
            if ($pedido->delete()) {
                return redirect()->route('pedidos.index')->with('mensaje', 'Pedido eliminado correctamente');

            }
        }

        return redirect()->route('pedidos.index')->with('mensaje', 'Es posible que el pedido con este Id no exista');


    }
}
