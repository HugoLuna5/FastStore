

@extends('tienda.master')

@section('titulo', 'Productos')
@section('customCSS')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/index.css')}}" />

    <link rel="stylesheet" href="{{asset('/css/masonry.css')}}" />
@endsection
@section('contenido')

    <header>
        <div
                id="carouselExampleIndicators"
                class="carousel slide"
                data-ride="carousel"
        >
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
            <!--Inicio Item-->
            <div class="itemMasonry">
                <h5 class="titleItem">Hot Dog</h5>
                <img class="imageItem" src="./assets/images/perrito.png" />
                <div class="containerDescItem text-center mt-5 mb-4">
                    <button class="btn btn-outline-secondary rounded-pill">
                        Detalles
                        <i data-feather="arrow-right"></i>
                    </button>
                </div>
            </div>
            <!--Fin Item-->

            <!--Inicio Item-->
            <div class="itemMasonry">
                <h5 class="titleItem">Tacos</h5>
                <img class="imageItem" src="./assets/images/tacos.png" />
                <div class="containerDescItem text-center mt-5 mb-4">
                    <button class="btn btn-outline-secondary rounded-pill">
                        Detalles
                        <i data-feather="arrow-right"></i>
                    </button>
                </div>
            </div>
            <!--Fin Item-->

            <!--Inicio Item-->
            <div class="itemMasonry" style="background-color: #add4ff">
                <h5 class="titleItem">Ensaladas</h5>
                <img class="imageItem" src="./assets/images/ensalada.png" />
                <div class="containerDescItem text-center mt-5 mb-4">
                    <button class="btn btn-outline-secondary rounded-pill">
                        Detalles
                        <i data-feather="arrow-right"></i>
                    </button>
                </div>
            </div>
            <!--Fin Item-->

            <!--Inicio Item-->
            <div class="itemMasonry" style="background-color: #ebd9da">
                <h5 class="titleItem">Milanesa de Res</h5>
                <img class="imageItem" src="./assets/images/milanesa.png" />
                <div class="containerDescItem text-center mt-5 mb-4">
                    <button class="btn btn-outline-secondary rounded-pill">
                        Detalles
                        <i data-feather="arrow-right"></i>
                    </button>
                </div>
            </div>
            <!--Fin Item-->

            <!--Inicio Item-->
            <div class="itemMasonry" style="background-color: #f5f5f5">
                <h5 class="titleItem">Pollo frito</h5>
                <img class="imageItem" src="./assets/images/pollofrito.png" />
                <div class="containerDescItem text-center mt-5 mb-4">
                    <button class="btn btn-outline-secondary rounded-pill">
                        Detalles
                        <i data-feather="arrow-right"></i>
                    </button>
                </div>
            </div>
            <!--Fin Item-->

            <!--Inicio Item-->
            <div class="itemMasonry" style="background-color: #f5f5f5">
                <h5 class="titleItem">Boneless BBQ</h5>
                <img class="imageItem" src="./assets/images/bonelessbbq.png" />
                <div class="containerDescItem text-center mt-5 mb-4">
                    <button class="btn btn-outline-secondary rounded-pill">
                        Detalles
                        <i data-feather="arrow-right"></i>
                    </button>
                </div>
            </div>
            <!--Fin Item-->

            <!--Inicio Item-->
            <div class="itemMasonry" style="background-color: #e6e3f0">
                <h5 class="titleItem">Hamburguesas</h5>
                <img class="imageItem" src="./assets/images/hamburguesa.png" />
                <div class="containerDescItem text-center mt-5 mb-4">
                    <button class="btn btn-outline-secondary rounded">
                        Detalles
                        <i data-feather="arrow-right"></i>
                    </button>
                </div>
            </div>
            <!--Fin Item-->
        </div>

        <div class="col-12 text-center mt-4 mb-5">
            <button
                    class="btn btn-outline-secondary rounded-pill customColorLoadMore"
            >
                Ver más
            </button>
        </div>
    </div>





@endsection