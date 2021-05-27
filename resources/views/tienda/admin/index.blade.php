@extends('layouts.admin')
@section('content')


    <div class="container text-center">

        <div class="page-header">
            <h1>Administrador Tienda en linea</h1>
        </div>
        <h3>Bienvenido(a) {{Auth::user()->name}} al panel de administración de tu tienda en linea</h3>

        <div class="row">
            <div class="col-md-6">
                <div class="card content-center">
                    <i data-feather="grid" class="iconCustom"></i>
                    <a href="{{route('categorias.index')}}" class="btn btn-warning btn-block">CATEGORIAS</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card content-center">
                    <i data-feather="tag" class="iconCustom"></i>
                    <a href="{{route('productos.index')}}" class="btn btn-warning btn-block">PRODUCTOS</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card content-center">
                    <i data-feather="shopping-bag" class="iconCustom"></i>
                    <a href="{{route('pedidos.index')}}" class="btn btn-warning btn-block">PEDIDOS</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card content-center">
                    <i data-feather="user" class="iconCustom"></i>
                    <a href="{{route('usuarios.index')}}" class="btn btn-warning btn-block">USUARIOS</a>
                </div>
            </div>
        </div>

    </div>



@endsection