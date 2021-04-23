<?php

namespace App\Http\Controllers;

use App\Model\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarController extends Controller
{


    /**
     * CarController constructor.
     */
    public function __construct()
    {
        if (!Session::has('carrito')) Session::put('carrito', array());
    }

    public function show()
    {

        $productos = Session::get('carrito');
        return view('tienda.car', compact('productos'));
    }

    public function add(Producto $producto)
    {
        $carrito = Session::get('carrito');
        $producto->cantidad = 1;
        $carrito[$producto->idproducto] = $producto;
        Session::put('carrito', $carrito);
        return redirect()->route('carrito');

    }

    public function update(Producto $producto, $cantidad){
         $carrito = Session::get('carrito');
         $carrito[$producto->idproducto]->cantidad = $cantidad;
         Session::put('carrito', $carrito);
         return redirect()->route('carrito');
    }

    public function delete(Producto $producto)
    {
        $carrito = Session::get('carrito');
        unset($carrito[$producto->idproducto]);
        Session::put('carrito', $carrito);
        return redirect()->route('carrito');

    }

}
