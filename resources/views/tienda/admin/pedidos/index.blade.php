@extends('layouts.admin')
@section('content')


    <div class="container">

        <div class="page-header text-center">
            <h1>Pedidos</h1>


        </div>

        <div class="row">


            <div class="col-8 offset-2">

                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped ">

                                <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Total</th>
                                    <th>Envio</th>
                                    <th>Fecha de creación</th>
                                    <th class="text-center">Acciones</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pedidos as $ped)
                                    <tr>
                                        <td>{{$ped->id}}</td>
                                        <td>{{$ped->user->name}}</td>
                                        <td>{{$ped->subtotal}}</td>
                                        <td>{{$ped->envio}}</td>
                                        <td>{{date("Y-m-d",strtotime($ped->created_at))}}</td>
                                        <td class="text-center">
                                            <button onclick="location.href = '{{route('pedidos.show', [$ped->id])}}'" class="btn btn-info text-white">
                                                <i data-feather="eye"></i>
                                            </button>

                                            <button onclick="document.getElementById('deletePedido{{$ped->id}}').submit()" class="btn btn-danger text-white">
                                                <i data-feather="delete"></i>
                                            </button>
                                            <form id="deletePedido{{$ped->id}}" action="{{route('pedidos.destroy', [$ped->id])}}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$ped->id}}">
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

