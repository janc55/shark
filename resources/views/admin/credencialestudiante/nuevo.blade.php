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
        <h4 class="tx-gray-800 mg-b-5">{{ __('Nuevo credencial') }}</h4>
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
    </div>
    <div class="card-body">
        <form action="{{route('credencialestudiante.store')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Apellido Paterno: </label>
                            <input type="text" class="form-control" name="apellido_paterno" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Apellido Materno: </label>
                            <input type="text" class="form-control" name="apellido_materno" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Código de Estudiante: </label>
                            <input type="text" class="form-control" name="cod_est" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Carrera: </label>
                            <select class="form-control select" aria-label=".form-select-sm example" name="carrera" required>
                                <option selected disabled value="">Elija una carrera...</option>
                                <option>Medicina</option>
                                <option>Odontología</option>
                                <option>Enfermería</option>
                                <option>Derecho</option>
                                <option>Administración de Empresas</option>
                                <option>Ing. de Sistemas</option>
                                <option>Auditoría</option>
                                <option>Gastronomía, Turismo y Hotelería</option>
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Cedula de identidad: </label>
                            <input type="number" class="form-control" name="cedula_identidad" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Ciudad: </label>
                            <select class="form-control" aria-label=".form-select-sm example" name="ciudad" required>
                                <option selected disabled value="">Elija una ciudad...</option>
                                <option>Oruro</option>
                                <option>La Paz</option>
                                <option>Potosí</option>
                                <option>Cochabamba</option>
                                <option>Sucre</option>
                                <option>Santa Cruz</option>
                                <option>Tarija</option>
                                <option>Beni</option>
                                <option>Pando</option>
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Fecha de nacimiento: </label>
                            <input type="date" class="form-control" name="fecha_nacimiento" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Correo electrónico: </label>
                            <input type="email" class="form-control" name="correo" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Celular: </label>
                            <input type="text" class="form-control" name="celular" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Tipo de sangre: </label>
                            <input type="text" class="form-control" name="tipo_sangre" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Vigencia: </label>
                            <select class="form-control" aria-label=".form-select-sm example" name="vigencia" required>
                                <option selected disabled value="">Seleccione los años</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Modelo: </label>
                            <select class="form-control" aria-label=".form-select-sm example" name="modelo" required>
                                <option selected disabled value="">Seleccione el modelo de la credencial</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Imagen: </label>
                            <input type="file" class="form-control-file" name="imagen">
                        </div>
                    </div><!-- col-4 -->
                </div><!-- row -->
                <div class="form-layout-footer">
                    <input type="submit" value="Crear credencial" class="btn btn-info">
                </div><!-- form-layout-footer -->
        </form>
    </div>
    @include('layouts.footer') 
</div>
@endsection