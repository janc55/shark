@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de Usuarios</h1>
            <a href="/usuario/create" class="btn btn-success">Nuevo usuario</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Gestion Roles
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Roles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/role" method="POST">
                        @csrf
                        <input type="text" name="nombre" class="form-control">
                        <input type="submit" value="Guardar Rol">
                    </form>
                    <table class="table">
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Acciones</td>
                        </tr>
                        @foreach ($lista_roles as $rol)
                        <tr>
                            <td>{{$rol->id}}</td>
                            <td>{{$rol->nombre}}</td>
                            <td></td>
                        </tr>
                            
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
            <table class="table table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <td>CORREO</td>
                        <td>NOMBRE</td>
                        <td>ROLES</td>
                        <td>EDITAR ROLES</td>
                        <td>ACCIONES</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista_usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->roles}}</td>
                        <td>EDITAR ROLES</td>
                        <td>
                            <button class="btn btn-warning">Editar</button>
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>       
    </div>
</div>
@endsection