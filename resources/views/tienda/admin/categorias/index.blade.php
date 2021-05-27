@extends('layouts.admin')
@section('content')


    <div class="container">

        <div class="page-header text-center">
            <h1>Categorias

                <a class="btn btn-primary" href="{{route('categorias.create')}}">Nueva <i data-feather="plus"></i></a>
            </h1>


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
                                  <th>Código</th>
                                  <th>Nombre</th>
                                  <th>Descripción</th>
                                  <th>Fecha de creación</th>
                                  <th class="text-center">Acciones</th>

                              </tr>
                              </thead>
                              <tbody>
                              @foreach($categorias as $cat)
                                  <tr>
                                      <td>{{$cat->idcategoria}}</td>
                                      <td>{{strtoupper($cat->codigo)}}</td>
                                      <td>{{$cat->nombre}}</td>
                                      <td>{{mb_strimwidth($cat->descripcion,0,15, '...')}}</td>
                                      <td>{{date("Y-m-d",strtotime($cat->created_at))}}</td>
                                      <td class="text-center">
                                          <button onclick="location.href = '{{route('categorias.edit', [$cat->idcategoria])}}'" class="btn btn-info text-white">
                                              <i data-feather="edit-3"></i>
                                          </button>

                                          <button onclick="document.getElementById('deleteCat{{$cat->idcategoria}}').submit()" class="btn btn-danger text-white">
                                              <i data-feather="delete"></i>
                                          </button>
                                          <form id="deleteCat{{$cat->idcategoria}}" action="{{route('categorias.destroy', [$cat->idcategoria])}}" method="POST">
                                              <input type="hidden" name="_method" value="DELETE">
                                              {{csrf_field()}}
                                              <input type="hidden" name="id" value="{{$cat->idcategoria}}">
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

