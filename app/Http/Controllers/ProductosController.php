<?php

namespace App\Http\Controllers;

use App\Model\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(){
        $productos =  Producto::all();

        return view('tienda.index', compact('productos'));
    }

    public function show($idProducto){
        $producto =  Producto::find($idProducto);

        if ($producto != null){
            return view('tienda.detalles', compact('producto'));
        }


        return back();


    }

}
