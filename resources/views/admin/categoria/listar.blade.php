@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.html">Inicio</a>
          <a class="breadcrumb-item" href="{{route('categoria.index')}}">Categoria</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Lista de Categorias</h4>
        <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('mensaje'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('mensaje') }}
                        </div>
                    @endif
        </div>
        <div class="card-body">
                    <a href="{{route('categoria.create')}}" class="btn btn-primary">Nueva Categoria</a>
                    <form action="{{route('categoria.index')}}" method="get" >
                        <input type="search" name="buscar" class="form-control mt-3" placeholder="Buscar...">
                    </form>
        </div>
      </div>
      <div class="br-pagebody">
            <table class="table table-bordered table-colored table-danger">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Credencial</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($lista_categorias as $categorias )
                        <tr>
                            <td scope="row">{{$categorias->cat_nombre}}</td>
                            <td>{{$categorias->cat_descripcion}}</td>
                            <td>
                                <a href="/categoria/{{ $categorias->id }}/edit" class="btn btn-warning btn-sm" >Editar</a>
                                <a href="#" class="btn btn-success btn-sm" >Imprimir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            {{$lista_categorias->links()}}
            </div>
            @include('layouts.footer') 
</div>
@endsection