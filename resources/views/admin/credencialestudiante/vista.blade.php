@extends('layouts.simple')

@section('content')

<div class="row mg-b-15">
    <div class="col-lg-6">
        <div class="signin-logo tx-center"><img src="{{asset('images/unior.png')}}" class="img-fluid" alt="Unior" style="width: 200px;"></div>
        <div class="tx-center mg-b-40"><h3>Datos personales</h3></div>
    </div><!-- col-4 -->
    <div class="col-lg-6">
        <div class="signin-logo tx-center">
            <img src="{{URL::asset($credencial->imagen)}}" class="img-thumbnail mb-2" alt="..." style="width: 150px;">
        </div>
    </div><!-- col-4 -->
</div><!-- row -->

<div class="row mg-b-25">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="" class="form-label">Nombre Completo: </label>
            <input type="text" class="form-control" name="nombre" value="{{$credencial->nombres}} {{$credencial->apellido_paterno}} {{$credencial->apellido_materno}}" readonly="readonly">
        </div>
    </div><!-- col-4 -->
    <div class="col-lg-6">
        <div class="form-group">
            <label for="" class="form-label">Cedula de identidad: </label>
            <input type="text" class="form-control" name="apellido_paterno" value="{{substr($credencial->cedula_identidad,0,4)}}XXX" readonly="readonly">
        </div>
    </div><!-- col-4 -->
    <div class="col-lg-6">
        <div class="form-group">
            <label for="" class="form-label">Ciudad: </label>
            <input type="text" class="form-control" name="apellido_materno" value="{{$credencial->ciudad}}" readonly="readonly">
        </div>
    </div><!-- col-4 -->
    <div class="col-lg-6">
        <div class="form-group">
            <label for="" class="form-label">Código de Estudiante: </label>
            <input type="text" class="form-control" name="cod_est" value="{{$credencial->cod_est}}" readonly="readonly">
        </div>
    </div><!-- col-4 -->
    <div class="col-lg-6">
        <div class="form-group">
            <label for="" class="form-label">Fecha de nacimiento: </label>
            <input type="text" class="form-control" name="apellido_materno" value="{{$credencial->fecha_nacimiento}}" readonly="readonly">
        </div>
    </div><!-- col-4 -->
    <div class="col-lg-6">
        <div class="form-group">
            <label for="" class="form-label">Carrera: </label>
            <input type="text" class="form-control" name="cod_est" value="{{$credencial->carrera}}" readonly="readonly">
        </div>
    </div><!-- col-4 -->
</div><!-- row -->


<div class="form-group tx-center tx-12">Los datos personales son obtenidos del sistema de la Universidad Privada de Oruro.</div>

@include('layouts.footer')
    
@endsection