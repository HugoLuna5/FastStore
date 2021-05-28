@extends('layouts.admin')
@section('content')


    <div class="container">

        <div class="page-header text-center">
            <h1>Usuarios

                <a class="btn btn-primary" href="{{route('usuarios.create')}}">Nuevo <i data-feather="plus"></i></a>
            </h1>


        </div>

        <div class="row">


            <div class="col-10 offset-1">

                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped ">

                                <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo electronico</th>
                                    <th>Tipo</th>
                                    <th>Fecha de creación</th>
                                    <th class="text-center">Acciones</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{strtoupper($user->tipo)}}</td>
                                        <td>{{date("Y-m-d",strtotime($user->created_at))}}</td>
                                        <td class="text-center">

                                            <button onclick="location.href = '{{route('usuarios.show', [$user->id])}}'" class="btn btn-info text-white">
                                                <i data-feather="eye"></i>
                                            </button>

                                            <button onclick="location.href = '{{route('usuarios.edit', [$user->id])}}'" class="btn btn-warning text-white">
                                                <i data-feather="edit-3"></i>
                                            </button>

                                            <button onclick="document.getElementById('deleteUser{{$user->id}}').submit()" class="btn btn-danger text-white">
                                                <i data-feather="delete"></i>
                                            </button>
                                            <form id="deleteUser{{$user->id}}" action="{{route('usuarios.destroy', [$user->id])}}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>


@endsection

