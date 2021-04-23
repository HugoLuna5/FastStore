<nav class="navbar navbar-expand-lg navbar-light customColor">
    <div class="container-fluid">
        <a class="customNavBar" href="{{url('/')}}">
            <img
                    src="{{asset('assets/images/fast_r.png')}}"
                    alt=""
                    class="d-inline-block align-top marginLogo"
            />
        </a>
        <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="navbar-nav ml-auto marginMenu">
                <li class="nav-item">
                    <a class="nav-link" href="#"> Productos </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Nosotros </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Contacto </a>
                </li>

                @include('tienda.secciones.customMenuUser')
                <li class="nav-item custom-nav-item">
                    <a class="nav-link nav-link-label" href="{{route('carrito')}}">
                        <i data-feather="shopping-bag"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>