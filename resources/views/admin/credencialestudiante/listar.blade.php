@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="index.html">Inicio</a>
            <a class="breadcrumb-item" href="{{route('credencialestudiante.index')}}">Credencial Estudiantes</a>
        </nav>
    </div><!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Lista de Credenciales</h4>
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
            <a href="{{route('credencialestudiante.create')}}" class="btn btn-primary">Nuevo Credencial</a>
            <form action="{{route('credencialestudiante.index')}}" method="get" >
                <div class="row">
                    <div class="col-lg-6">
                        <input type="search" name="buscar" class="form-control mt-3" placeholder="Buscar...">
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <a href="{{route('credencialestudiante.index')}}" class="btn btn-primary mt-3">Limpiar</a>
                    </div><!-- col-4 -->
                </div><!-- row -->
            </form>
        </div>
    </div>
    <div class="br-pagebody">
        <table class="table table-bordered table-colored table-danger">
            <thead>
                <tr>
                    <th scope="col">COD</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">CI</th>
                    <th scope="col">Credencial</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista_credenciales as $credenciales )
                <tr>
                    <td scope="row">{{$credenciales->cod_est}}</td>
                    <td scope="row">{{$credenciales->nombres}}</td>
                    <td>{{$credenciales->apellido_paterno}} {{$credenciales->apellido_materno}}</td>
                    <td>{{$credenciales->cedula_identidad}}</td>
                    <td>
                        <a href="/credencialestudiante/{{ $credenciales->id }}/edit" class="btn btn-warning btn-sm" >Editar</a>
                        <a href="/credencialestudiante/{{ $credenciales->id }}/imprimir" class="btn btn-success btn-sm" >Imprimir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$lista_credenciales->links()}}
    </div>
    @include('layouts.footer') 
</div>
@endsection