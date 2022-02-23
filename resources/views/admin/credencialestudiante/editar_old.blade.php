@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar credencial esto esta funcionando') }}</div>
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
                <form action="{{route('credencialestudiante.update', $credencial->id)}}" method="post" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <label for="" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="nombre" value='{{$credencial->nombres}}' required>
                        <br>
                        <label for="" class="form-label">Apellido Paterno: </label>
                        <input type="text" class="form-control" name="apellido_paterno" value='{{$credencial->apellido_paterno}}' required>
                        <br>
                        <label for="" class="form-label">Apellido Materno: </label>
                        <input type="text" class="form-control" name="apellido_materno" value='{{$credencial->apellido_materno}}' required>
                        <br>
                        <label for="" class="form-label">Codigo de estudiante: </label>
                        <input type="text" class="form-control" name="cod_est" value='{{$credencial->cod_est}}' required>
                        <br>
                        <select class="form-control" aria-label=".form-select-sm example" name="Carrera" required>
                            <option {{($credencial->carrera == 'Medicina')?'selected':''}}>Medicina</option>
                            <option {{($credencial->carrera == 'Odontología')?'selected':''}}>Odontología</option>
                            <option {{($credencial->carrera == 'Enfermería')?'selected':''}}>Enfermería</option>
                            <option {{($credencial->carrera == 'Derecho')?'selected':''}}>Derecho</option>
                            <option {{($credencial->carrera == 'Administración de Empresas')?'selected':''}}>Administración de Empresas</option>
                            <option {{($credencial->carrera == 'Ing. de Sistemas')?'selected':''}}>Ing. de Sistemas</option>
                            <option {{($credencial->carrera == 'Auditoría')?'selected':''}}>Auditoría</option>
                            <option {{($credencial->carrera == 'Gastronomía, Turismo y Hotelería')?'selected':''}}>Gastronomía, Turismo y Hotelería</option>
                        </select>
                        <br>
                        <label for="" class="form-label">Cedula de identidad: </label>
                        <input type="number" class="form-control" name="cedula_identidad"  value='{{$credencial->cedula_identidad}}' required>
                        <br>
                      
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
                        <br>
                        
                        <label for="" class="form-label">Fecha de nacimiento: </label>
                        <input type="date" class="form-control" name="fecha_nacimiento" value='{{$credencial->fecha_nacimiento}}' required>
                        <br>
                        <label for="" class="form-label">Correo electrónico: </label>
                        <input type="email" class="form-control" name="correo" value='{{$credencial->correo}}' required>
                        <br>
                        <label for="" class="form-label">Celular: </label>
                        <input type="text" class="form-control" name="celular" value='{{$credencial->celular}}' required>
                        <br>
                        <label for="" class="form-label">Tipo de sangre: </label>
                        <input type="text" class="form-control" name="tipo_sangre" value='{{$credencial->tipo_sangre}}' required>
                        <br>
                        <label for="" class="form-label">Imagen: </label>
                        <input type="file" class="form-control-file" name="imagen">
                        <br>
                        <input type="submit" value="Editar credencial" class="btn btn-primary">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection