@extends('tienda.master') @section('titulo', 'Detalles del producto')
@section('titulo', 'Carrito')
@section('customCSS')
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}"/>
    <link rel="stylesheet" href="{{asset('/css/cart.css')}}"/>
@endsection
@section('contenido')

    <div class="container">
        @if(count($productos))
            <div class="row">
                <div class="col-12">
                    <h5 class="text-center">Carrito de compra</h5>
                    <hr/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ITEM</th>
                                <th scope="col">DESCRIPCIÓN</th>

                                <th scope="col">CANTIDAD</th>
                                <th scope="col">PRECIO UNITARIO</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <th class="customSizeThImage">
                                        <img
                                                class="imgTable"
                                                src="{{url('/img/'.$producto->imagen)}}"
                                                alt=""
                                        />
                                    </th>
                                    <th class="customSizeThDesc">
                                        <p class="nameItem">{{$producto->nombre}}</p>
                                        <p class="descItem">
                                            {{$producto->descripcion}}
                                        </p>
                                    </th>

                                    <th>
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
                                        ><i data-feather="refresh-cw" class="feather"></i></a>
                                    </th>
                                    <th class="text-right">
                                        <p class="descItem">${{$producto->precio}} MXN
                                            <br>
                                            {{$producto->cantidad}} * ${{$producto->precio}} MXN =
                                            ${{$producto->cantidad * $producto->precio}} MXN
                                        </p>
                                        <button onclick="location.href = '{{ route('deleteCar', [$producto]) }}'"
                                                class="btn bottom-0 btn-sm btn-block btn-outline-dark"
                                        >
                                            REMOVER ESTE PRODUCTO
                                        </button>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 offset-8">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr class="table-borderless">
                                <td>SUBTOTAL</td>
                                <td>${{$total}} MXN</td>
                            </tr>
                            <tr>
                                <td>ENVIO</td>
                                <td>Gratis</td>
                            </tr>
                            <tr>
                                <td>DIRECCIÓN</td>
                                <td>{{Auth::user()->direction}}</td>
                            </tr>
                            <tr>
                                <td>
                                    EMAIL
                                </td>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <td>IVA 16%</td>
                                <td>%
                                    @php
                                        $iva = $total * .16;
                                        echo $iva;
                                    @endphp
                                    MXN
                                </td>
                            </tr>
                            <tr class="customBorder">
                                <td>TOTAL</td>
                                <td><b>${{$total + $iva}} MXN</b></td>
                            </tr>
                            </tbody>
                        </table>


                    </div>
                    <hr>
                </div>


            </div>

            <div class="row mb-5">
                <div class="col-4 offset-8">
                    <button onclick="location.href = '{{route('inicio')}}'" class="btn btn-primary btn-block">
                        <span class="iconBtn"><i data-feather="arrow-left"></i></span>
                        SEGUIR COMPRANDO
                    </button>

                    <button onclick="location.href = '{{route('payment')}}'" class="btn btn-dark btn-block">
                        <span class="iconBtn"><i data-feather="credit-card"></i></span>
                        PAGAR
                    </button>

                </div>

            </div>
        @else
            <div class="row">
                <div class="col-md-4 offset-4">
                    <h3 class="text-center btn btn-danger center-block">
                        No hay productos agregados al carrito
                    </h3>
                </div>
            </div>

        @endif
    </div>



@endsection
@section('customJS')
    <script src="{{asset('/js/car.js')}}"></script>
@endsection
