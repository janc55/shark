@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h1 class="card-header">Lista de credenciales</h1>
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
                    <a href="{{route('credencial.create')}}" class="btn btn-primary">Nuevo Credencial</a>
                    <form action="{{route('credencial.index')}}" method="get" >
                        <input type="search" name="buscar" class="form-control mt-3" placeholder="Buscar...">
                    </form>
                </div>
                <div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">CI</th>
                        <th scope="col">Credencial</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($lista_credenciales as $credenciales )
                        <tr>
                            <td scope="row">{{$credenciales->nombres}}</td>
                            <td>{{$credenciales->apellidos}}</td>
                            <td>{{$credenciales->cedula_identidad}}</td>
                            <td>
                                <a href="/credencial/{{ $credenciales->id }}/edit" class="btn btn-warning btn-sm" >Editar</a>
                                <a href="/credencial/{{ $credenciales->id }}/imprimir" class="btn btn-success btn-sm" >Imprimir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$lista_credenciales->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection