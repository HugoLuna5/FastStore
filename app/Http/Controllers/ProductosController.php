<?php

namespace App\Http\Controllers;

use App\Model\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(){
        return Producto::all();
    }
}
