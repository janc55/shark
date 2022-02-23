@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h1 class="card-header">Lista de estudiantes</h1>
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
                    <a href="{{route('estudiante.create')}}" class="btn btn-primary">Nuevo Estudiante</a>
                    <form action="{{route('estudiante.index')}}" method="get" >
                        <input type="search" name="buscar" class="form-control mt-3" placeholder="Buscar...">
                    </form>
                </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Credencial</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($lista_estudiantes as $estudiantes )
                        <tr>
                            <td scope="row">{{$estudiantes->est_nombre}}</td>
                            <td>{{$estudiantes->est_apellidos}}</td>
                            <td>{{$estudiantes->est_correo}}</td>
                            <td>
                                <a href="/estudiante/{{ $estudiantes->id }}/edit" class="btn btn-warning btn-sm" >Editar</a>
                                <a href="#" class="btn btn-success btn-sm" >Imprimir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$lista_estudiantes->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection