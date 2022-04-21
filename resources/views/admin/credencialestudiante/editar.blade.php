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
        <h4 class="tx-gray-800 mg-b-5">{{ __('Editar credencial de estudiante') }}</h4>
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
        <form action="{{route('credencialestudiante.update', $credencial->id)}}" method="post" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" value='{{$credencial->nombres}}' required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Apellido Paterno: </label>
                            <input type="text" class="form-control" name="apellido_paterno" value='{{$credencial->apellido_paterno}}' required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Apellido Materno: </label>
                            <input type="text" class="form-control" name="apellido_materno" value='{{$credencial->apellido_materno}}' required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Código de Estudiante: </label>
                            <input type="text" class="form-control" name="cod_est" value='{{$credencial->cod_est}}' required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Carrera: </label>
                            <select class="form-control select" aria-label=".form-select-sm example" name="carrera" required>
                                <option {{($credencial->carrera == 'Medicina')?'selected':''}}>Medicina</option>
                                <option {{($credencial->carrera == 'Odontología')?'selected':''}}>Odontología</option>
                                <option {{($credencial->carrera == 'Enfermería')?'selected':''}}>Enfermería</option>
                                <option {{($credencial->carrera == 'Derecho')?'selected':''}}>Derecho</option>
                                <option {{($credencial->carrera == 'Administración de Empresas')?'selected':''}}>Administración de Empresas</option>
                                <option {{($credencial->carrera == 'Ing. de Sistemas')?'selected':''}}>Ing. de Sistemas</option>
                                <option {{($credencial->carrera == 'Auditoría')?'selected':''}}>Auditoría</option>
                                <option {{($credencial->carrera == 'Gastronomía, Turismo y Hotelería')?'selected':''}}>Gastronomía, Turismo y Hotelería</option>
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Cedula de identidad: </label>
                            <input type="number" class="form-control" name="cedula_identidad" value='{{$credencial->cedula_identidad}}' required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Ciudad: </label>
                            <select class="form-control" aria-label=".form-select-sm example" name="ciudad" required>
                                <option {{($credencial->ciudad == 'Oruro')?'selected':''}}>Oruro</option>
                                <option {{($credencial->ciudad == 'La Paz')?'selected':''}}>La Paz</option>
                                <option {{($credencial->ciudad == 'Potosi')?'selected':''}}>Potosí</option>
                                <option {{($credencial->ciudad == 'Cochabamba')?'selected':''}}>Cochabamba</option>
                                <option {{($credencial->ciudad == 'Sucre')?'selected':''}}>Sucre</option>
                                <option {{($credencial->ciudad == 'Santa Cruz')?'selected':''}}>Santa Cruz</option>
                                <option {{($credencial->ciudad == 'Tarija')?'selected':''}}>Tarija</option>
                                <option {{($credencial->ciudad == 'Beni')?'selected':''}}>Beni</option>
                                <option {{($credencial->ciudad == 'Pando')?'selected':''}}>Pando</option>
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Fecha de nacimiento: </label>
                            <input type="date" class="form-control" name="fecha_nacimiento" value='{{$credencial->fecha_nacimiento}}' required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Correo electrónico: </label>
                            <input type="email" class="form-control" name="correo" value='{{$credencial->correo}}' required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Celular: </label>
                            <input type="text" class="form-control" name="celular" value='{{$credencial->celular}}' required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="form-label">Tipo de sangre: </label>
                            <input type="text" class="form-control" name="tipo_sangre" value='{{$credencial->tipo_sangre}}' required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Vigencia: </label>
                            <select class="form-control" aria-label=".form-select-sm example" name="vigencia" required>
                                <option {{($credencial->vigencia == '1')?'selected':''}}>1</option>
                                <option {{($credencial->vigencia == '2')?'selected':''}}>2</option>
                                <option {{($credencial->vigencia == '3')?'selected':''}}>3</option>
                                <option {{($credencial->vigencia == '4')?'selected':''}}>4</option>
                                <option {{($credencial->vigencia == '5')?'selected':''}}>5</option>
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Modelo: </label>
                            <select class="form-control" aria-label=".form-select-sm example" name="modelo" required>
                                <option {{($credencial->modelo == '1')?'selected':''}}>1</option>
                                <option {{($credencial->modelo == '2')?'selected':''}}>2</option>
                                <option {{($credencial->modelo == '3')?'selected':''}}>3</option>
                                <option {{($credencial->modelo == '4')?'selected':''}}>4</option>
                                <option {{($credencial->modelo == '5')?'selected':''}}>5</option>
                                <option {{($credencial->modelo == '6')?'selected':''}}>6</option>
                                <option {{($credencial->modelo == '7')?'selected':''}}>7</option>
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
                    <input type="submit" value="Editar credencial" class="btn btn-info">
                </div><!-- form-layout-footer -->
        </form>
    </div>
    @include('layouts.footer') 
</div>
@endsection