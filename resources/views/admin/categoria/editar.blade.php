@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Editar estudiante') }}</div>
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
                <form action="{{route('estudiante.update', $estudiante->id)}}" method="post" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <label for="" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="nombre" value='{{$estudiante->est_nombre}}' required>
                        <br>
                        <label for="" class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" name="apellidos" value='{{$estudiante->est_apellidos}}' required>
                        <br>
                        <label for="" class="form-label">Correo electrónico: </label>
                        <input type="email" class="form-control" name="correo" value='{{$estudiante->est_correo}}' required>
                        <br>
                        <label for="" class="form-label">Celular: </label>
                        <input type="text" class="form-control" name="celular" value='{{$estudiante->est_celular}}' required>
                        <br>
                        <label for="" class="form-label">Sexo: </label>
                        <select class="form-control" aria-label=".form-select-sm example" name="sexo" required>
                            <option {{($estudiante->est_sexo == 'Masculino')?'selected':''}}>Masculino</option>
                            <option {{($estudiante->est_sexo == 'Femenino')?'selected':''}}>Femenino</option>
                        </select>
                        <br>
                        <input type="submit" value="Editar credencial" class="btn btn-primary">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection