@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.html">Inicio</a>
          <a class="breadcrumb-item" href="{{route('curso.index')}}">Cursos</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Lista de cursos</h4>
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
                    <a href="{{route('curso.create')}}" class="btn btn-primary">Nuevo Curso</a>
                    <form action="{{route('curso.index')}}" method="get" >
                        <input type="search" name="buscar" class="form-control mt-3" placeholder="Buscar...">
                    </form>
        </div>
      </div>
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <table class="table table-bordered table-colored table-danger">
            <thead>
              <tr>
                <th class="wd-10p">ID</th>
                <th class="wd-25p">Nombre</th>
                <th class="wd-30p">Descripción</th>
                <th class="wd-20p">Instructor</th>
                <th class="wd-20p">Categoria</th>
                <th class="wd-20p">Diseño</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($lista_cursos as $curso )
                        <tr>
                            <td scope="row">{{$curso->id}}</td>
                            <td>{{$curso->cur_nombre}}</td>
                            <td>{{$curso->cur_descripcion}}</td>
                            <td>{{$curso->ins_id}}</td>
                            
                            <td>
                                <a href="/curso/{{ $curso->id }}/edit" class="btn btn-warning btn-sm" >Editar</a>
                                <a href="#" class="btn btn-success btn-sm" >Imprimir</a>
                            </td>
                        </tr>
              @endforeach
            </tbody>
          </table>
          {{$lista_cursos->links()}}
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
      @include('layouts.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection