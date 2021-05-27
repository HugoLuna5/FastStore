@extends('layouts.admin')
@section('content')

    <div class="container">

        <div class="page-header text-center">
            <h1>Usuarios
                <small>[Ver Usuario]</small>
            </h1>
        </div>

        <div class="row">

            <div class="col-6 offset-3">

                <div class="card">

                    <div class="card-body">



                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input readonly value="{{$user->name}}" class="form-control" type="text" name="name" id="name" required
                                       placeholder="Ingrese el nombre">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electronico</label>
                                <input readonly value="{{$user->email}}" class="form-control" type="email" name="email" id="email" required
                                       placeholder="Ingrese el correo electronico">
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo de cuenta</label>
                                <select readonly name="tipo" id="tipo" class="form-control" required>
                                    <option value="user">Usuario</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="direction">Dirección</label>
                                <textarea readonly required name="direction" id="direction" class="form-control">{{$user->direction}}</textarea>

                            </div>

                            <div class="form-group text-center m-2">
                                <button onclick="location.href = '{{route('resetPassword', $user->id)}}'" type="submit" class="btn btn-success m-1">Restablecer contraseña</button>
                                <a href="{{route('usuarios.edit', $user->id)}}" class="btn btn-warning m-1">Editar</a>
                            </div>


                    </div>

                </div>


            </div>


        </div>


    </div>

    <script>
        document.getElementById('tipo').value = '{{$user->tipo}}';
    </script>
@endsection