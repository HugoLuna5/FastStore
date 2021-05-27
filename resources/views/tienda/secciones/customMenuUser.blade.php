@if(Auth::check())

    <li class="nav-item custom-nav-item dropdown" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <a class="nav-link nav-link-label" href="#">
            {{Auth::user()->name}}
            
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            @if(Auth::user()->tipo == 'admin')
                <a class="dropdown-item" onclick="location.href = '{{route('homeAdmin')}}'" href="{{route('homeAdmin')}}" >Administrador</a>
            @endif



            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">
                {!! csrf_field() !!}
            </form>
        </div>

    </li>

    @else

    <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}"> Inciar Sesión </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}"> Registrase </a>
    </li>

    @endif