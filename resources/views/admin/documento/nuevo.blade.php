@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2>Nuevo documento</h2>
                <form action="{{route('documento.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="">Ingrese Titulo: </label>
                    <input type="text" name="titulo">
                    <br>
                    <label for="">Ingrese Gestion: </label>
                    <input type="date" name="fecha">
                    <br>
                    <label for="">Ingrese Tipo: </label>
                    <input type="text" name="tipo">
                    <br>
                    <label for="">Descripcion: </label>
                    <textarea name="descripcion"></textarea>
                    <br>
                    <label for="">Ingrese Archivo: </label>
                    <input type="file" name="archivo">
                    <br>
                    <input type="submit" value="Subir archivo">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection