@extends('layouts.vacio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger p-3 text-white bg-opacity-75">{{ __('Datos Credencial UNIOR') }}</div>
                <div class="card-body">
                    <img src="{{URL::asset($credencial->imagen)}}" class="img-thumbnail mb-2" alt="..." style="width: 200px;" >
                    <p><b>Nombre Completo:</b> {{$credencial->nombres}} {{$credencial->apellidos}} </p>
                    <p><b>Cedula de Identidad:</b> {{$credencial->cedula_identidad}}</p>
                    <p><b>Lugar de nacimiento:</b> {{$credencial->ciudad}}</p>
                    <p><b>Cargo:</b> {{$credencial->cargo}}</p>
                    <p><b>Fecha de nacimiento:</b> {{$credencial->fecha_nacimiento}}</p>
                    <p><b>Tipo de sangre:</b> {{$credencial->tipo_sangre}}</p>
                    <p><b>Celular:</b> {{$credencial->celular}}</p>
                    <p><b>Correo electronico:</b> {{$credencial->correo}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection