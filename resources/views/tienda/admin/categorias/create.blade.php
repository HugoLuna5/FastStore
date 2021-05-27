@extends('layouts.admin')
@section('content')

    <div class="container">

        <div class="page-header text-center">
            <h1>Categorias
                <small>[Agregar Categoria]</small>
            </h1>
        </div>

        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">

                        @if(count($errors) > 0)
                            @include('layouts.errors')
                        @endif

                        <form action="{{route('categorias.store')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required
                                       placeholder="Ingrese el nombre">
                            </div>

                            <div class="form-group">
                                <label for="codigo">Código</label>
                                <input class="form-control" type="text" name="codigo" id="codigo" required
                                       placeholder="Ingrese el código">
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>

                            </div>

                            <div class="form-group text-center m-2">
                                <button type="submit" class="btn btn-success m-1">Guardar</button>
                                <a href="{{route('categorias.index')}}" class="btn btn-warning m-1">Cancelar</a>
                            </div>

                        </form>
                    </div>

                </div>


            </div>


        </div>


    </div>


@endsection