@extends('layouts.admin')
@section('content')

    <div class="container">

        <div class="page-header text-center">
            <h1>Productos
                <small>[Ver Producto]</small>
            </h1>
        </div>

        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">



                            <input type="hidden" name="idestado" value="1">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input value="{{$producto->nombre}}" readonly class="form-control" type="text" name="nombre" id="nombre" required
                                       placeholder="Ingrese el nombre">
                            </div>

                            <div class="form-group">
                                <label for="codigo">Código</label>
                                <input value="{{$producto->codigo}}" readonly class="form-control" type="text" name="codigo" id="codigo" required
                                       placeholder="Ingrese el código">
                            </div>

                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input value="{{$producto->precio}}" readonly class="form-control" type="text" name="precio" id="precio" required
                                       placeholder="Ingrese el precio">
                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                <input value="{{$producto->color}}" readonly class="form-control" type="color" name="color" id="color" required
                                       placeholder="Ingrese el color">
                            </div>

                            <div class="form-group">
                                <label for="img">Imagen</label>
                                <input value="{{$producto->imagen}}" readonly class="form-control" type="file" name="img" id="img" required
                                       placeholder="Ingrese la imagen">
                            </div>

                            <div class="form-group">
                                <label for="idcategoria">Categoria</label>
                                <select readonly name="idcategoria" id="idcategoria" class="form-control">
                                    <option value="{{$producto->categoria->idcategoria}}">{{$producto->categoria->nombre}}</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea readonly name="descripcion" id="descripcion" class="form-control">{{$producto->descripcion}}</textarea>

                            </div>

                            <div class="form-group text-center m-2">
                                <button onclick="location.href = '{{route('productos.edit', $producto->idproducto)}}'" class="btn btn-success m-1">Editar</button>
                                <a href="{{route('productos.index')}}" class="btn btn-warning m-1">Cancelar</a>
                            </div>


                    </div>

                </div>


            </div>


        </div>


    </div>


@endsection