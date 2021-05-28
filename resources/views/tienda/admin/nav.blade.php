<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid customMarginNav" >
        <a class="navbar-brand" href="{{route('inicio')}}">FastStore Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="navbar-nav ml-auto marginMenu">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('homeAdmin')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categorias.index')}}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('productos.index')}}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pedidos.index')}}">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('usuarios.index')}}">Usuarios</a>
                </li>

            </ul>

        </div>
    </div>
</nav>