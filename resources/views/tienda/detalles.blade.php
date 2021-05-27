@extends('tienda.master')

@section('titulo', 'Detalles del producto')

@section('customCSS')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/details.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/detail-carousel.css')}}"/>
@endsection

@section('contenido')




    <div class="container">
        <div class="row">
            <div class="col-md-7 containerSlider">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <!-- Slide One  -->
                        <div class="carousel-item active" style="background-color: {{$producto->color}}">
                            <div class="carousel-caption">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{url('/img/'.$producto->imagen)}}" class="imageSlide mx-auto d-block"
                                             alt=""/>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="containerText">
                                            <p class="textContent shopNameTextSlider">

                                            </p>
                                            <h4 class="textContent productNameTextSlider">
                                                <b>{{$producto->nombre}}</b>
                                            </h4>
                                            <p class="textContent priceProducto">${{$producto->precio}} MXN</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="containerInfo mt-5">
                    <div class="containerDesc">
                        <h5>Descripción</h5>
                        <p>
                            {{$producto->descripcion}}
                        </p>
                    </div>
                    <div class="containerProductInfo">
                        <h6>Información del producto</h6>
                        <div class="row">
                            <div class="col-auto">
                                <p><b>Tamaño</b></p>
                            </div>
                            <div class="col-auto">
                                <p class="customMarginInfoProduct">Normal</p>
                            </div>
                        </div>
                        <hr class="borderCustomHR"/>
                        <div class="row">
                            <div class="col-auto">
                                <p><b>Ingredientes</b></p>
                            </div>
                            <div class="col-auto">
                                <ul class="customIngredients">
                                    <li>*</li>

                                </ul>
                            </div>
                        </div>
                        <hr/>
                        <div class="row text-center">
                            <div class="col-md-6 p-2">
                                <button onclick="location.href = '{{route('addCar', [$producto])}}'" class="btn btn-block bt-customCar rounded-pill">
                                    Agregar al carrito
                                </button>
                            </div>
                            <div class="col-md-6 p-2">
                                <button onclick="location.href = '{{route('addCar', [$producto])}}'" class="btn btn-block bt-customBuy rounded-pill">
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection