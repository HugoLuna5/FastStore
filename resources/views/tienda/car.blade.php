@extends('tienda.master') @section('titulo', 'Detalles del producto')
@section('customCSS')
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
@endsection @section('contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                @if(count($productos))
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach($productos as $producto)
                                <tr>
                                    <td>
                                        <img
                                                width="50"
                                                src="{{url('/img/'.$producto->imagen)}}"
                                                alt=""
                                        />
                                    </td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->precio}}</td>
                                    <td>
                                        <input
                                                type="number"
                                                min="1"
                                                max="50"
                                                value="{{$producto->cantidad}}"
                                                id="producto_{{$producto->idproducto}}"
                                        />
                                        <a
                                                href="#"
                                                data-id="{{$producto->idproducto}}"
                                                data-href="{{route('updateCar', [$producto->idproducto])}}"
                                                class="btn btn-warning btn-update-item"
                                        ><i data-feather="refresh"></i
                                            ></a>
                                    </td>
                                    <td>
                                        {{$producto->cantidad * $producto->precio}}
                                    </td>
                                    <td>
                                        <a
                                                href="{{ route('deleteCar', [$producto]) }}"
                                                class="btn btn-danger">
                                            <i data-feather="times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php
                                    $total = $total + ($producto->precio * $producto->cantidad);
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                        <b>
                            Monto total: $ {{$total}} MXNs
                        </b>
                    </div>
                @else
                    <h3 class="text-center btn btn-danger center-block">
                        No hay productos agregados al carrito
                    </h3>
                @endif
            </div>
        </div>
    </div>

@endsection
@section('customJS')
    <script src="{{asset('/js/car.js')}}"></script>
@endsection
