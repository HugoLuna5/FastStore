@extends('layouts.admin')
@section('content')


    <div class="container">

        <div class="page-header text-center">
            <h1>Productos

                <a class="btn btn-primary" href="{{route('productos.create')}}">Nuevo <i data-feather="plus"></i></a>
            </h1>


        </div>

        <div class="row">


            <div class="col-8 offset-2">

                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped ">

                                <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>precio</th>
                                    <th>Fecha de creación</th>
                                    <th class="text-center">Acciones</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $pro)
                                    <tr>
                                        <td>{{$pro->idproducto}}</td>
                                        <td>{{$pro->codigo}}</td>

                                        <td>{{$pro->nombre}}</td>
                                        <td>{{$pro->precio}}</td>
                                        <td>{{date("Y-m-d",strtotime($pro->created_at))}}</td>
                                        <td class="text-center">

                                            <button onclick="location.href = '{{route('productos.show', [$pro->idproducto])}}'" class="btn btn-info text-white">
                                                <i data-feather="eye"></i>
                                            </button>

                                            <button onclick="location.href = '{{route('productos.edit', [$pro->idproducto])}}'" class="btn btn-warning text-white">
                                                <i data-feather="edit-3"></i>
                                            </button>

                                            <button onclick="document.getElementById('deleteProducto{{$pro->idproducto}}').submit()" class="btn btn-danger text-white">
                                                <i data-feather="delete"></i>
                                            </button>
                                            <form id="deleteProducto{{$pro->idproducto}}" action="{{route('productos.destroy', [$pro->idproducto])}}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$pro->idproducto}}">
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>


@endsection

