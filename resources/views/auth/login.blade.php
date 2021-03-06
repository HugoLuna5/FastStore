@extends('tienda.layoutLogin')
@section('titulo', 'Iniciar sesión')
@section('customCSS')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{asset('/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/login.css')}}"/>
@endsection
@section('contenido')
    <div class="container containerMain">
        <div class="row containerRow">
            <div class="col col-md-6 containerImage"></div>
            <div class="col col-md-6 containerItems">
                <div class="itemsContainer">
                    <form method="POST" action="{{ route('login') }}">
                        {!! csrf_field() !!}
                        <h3 class="welcomeText">¡Bienvenido de nuevo!</h3>
                        <p class="text-white mt-4 textDescription">
                            ¿Por que no pides tu comida preferidad por Fast Store? <br/>
                            Simplemente ordena lo que más te apetezca y nosotros te llevamos
                            el pedido a tu domicilio.
                        </p>
                        <div class="mt-5">
                            <div class="row m-2 mt-3">
                                <div class="col-md-12">
                                    <div class="containerEmail row borderFirstItem {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-1 text-center containerSVG">
                                            <i class="colorIcon" data-feather="mail"></i>
                                        </div>
                                        <div class="col text-center">
                                            <input
                                                    value="{{ old('email') }}" required autofocus
                                                    class="form-control fieldEmail"
                                                    type="email"
                                                    name="email"
                                                    id="email"
                                                    placeholder="fast@fastdelivery.com.mx"
                                            />
                                        </div>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <div class="containerPass row boderSecondItem {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="col-1 text-center containerSVG">
                                            <i class="colorIcon" data-feather="key"></i>
                                        </div>
                                        <div class="col text-center">
                                            <input
                                                    class="form-control fieldEmail"
                                                    type="password"
                                                    name="password"
                                                    id="password"
                                                    required
                                                    placeholder="***********"
                                            />
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="containerRemembermeAndMore mt-3">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input colorInputCheck" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-white" for="remember">
                                            Recuérdame
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <a href="{{ route('password.request') }}" class="bgTextPassReset">¿Olvidaste tu
                                        contraseña?</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-5">
                            <button type="submit" class="btn bgLoginBtn">Iniciar Sesión</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
