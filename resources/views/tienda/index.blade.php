@extends('tienda.master')

@section('titulo', 'Inicio')
@section('customCSS')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/carousel.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/index.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/masonry.css')}}"/>
@endsection
@section('contenido')

    <header>
        <div
                id="carouselExampleIndicators"
                class="carousel slide"
                data-ride="carousel">
            <ol class="carousel-indicators">
                <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="0"
                        class="active"
                ></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One  -->
                <div class="carousel-item active" style="background-color: #add4ff">
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="containerText">
                                    <p class="textContent shopNameTextSlider">Burguer King</p>
                                    <h4 class="textContent productNameTextSlider">
                                        <b>Hamburguesa 1/4 libra</b>
                                    </h4>
                                    <p class="textContent priceProducto">$180.00 MXN</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <img
                                        src="./assets/images/hamburguesa.png"
                                        class="imageSlide"
                                        alt=""
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="masonry">


        @foreach($productos as $producto)
            <!--Inicio Item-->
                <div class="itemMasonry" style="background-color: {{$producto->color}}">
                    <h5 class="titleItem">{{$producto->nombre}}</h5>
                    <img class="imageItem" src="{{url('/img/'.$producto->imagen)}}"/>
                    <div class="containerDescItem text-center mt-5 mb-4">
                        <button onclick="location.href = '{{route('producto-detalle', $producto->idproducto)}}'"
                                class="btn btn-outline-secondary rounded-pill">
                            Detalles
                            <i data-feather="arrow-right"></i>
                        </button>
                    </div>
                </div>
                <!--Fin Item-->
            @endforeach


        </div>

        <div class="col-12 text-center mt-4 mb-5">
            <button class="btn btn-outline-secondary rounded-pill customColorLoadMore">
                Ver más
            </button>
        </div>
    </div>



@endsection