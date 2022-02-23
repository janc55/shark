@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Lista documentos</h2>
            <div class="card">
                <a class="btn btn-success" href="{{route('documento.create')}}">Registrar Nuevo Documento</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>TITULO</th>
                            <th>FECHA</th>
                            <th>ARCHIVO</th>
                            <th>USUARIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista_docs as $doc )
                        <tr>
                            <td>{{$doc->titulo}}</td>
                            <td>{{$doc->fecha}}</td>
                            <td>
                                <a href="/{{$doc->archivo}}" target="_blank">Mostrar Archivo</a>
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection