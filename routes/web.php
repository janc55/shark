<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\CredencialController;
use App\Http\Controllers\CredencialEstudianteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SucursalController;
use App\Models\Estudiante;

Route::get('/', function () {
    return view('home');
});

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/miapp", [App\Http\Controllers\PaginaController::class, "miapp"]);

//GET POST PUT DELETE
Route::get("/credencial/{cedula_identidad}/vista", [CredencialController::class, "vista"]);
Route::get("/credencialestudiante/{cedula_identidad}/vista", [CredencialEstudianteController::class, "vista"]);


Route::middleware(['auth'])->group(function (){

    Route::get('/', function () {
        return redirect('/home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', function(){
        return "Administracion";
    });
    Route::get('/admin/usuario', function(){
        return "Lista de usuario";
    });
    Route::resource("credencial", CredencialController::class);
    Route::resource("credencialestudiante", CredencialEstudianteController::class);
    Route::get("/credencialestudiante/{id}/imprimir", [CredencialEstudianteController::class, "imprimir"]);
    Route::resource("estudiante", EstudianteController::class);
    Route::resource("instructor", InstructorController::class);
    Route::resource("categoria", CategoriaController::class);
    Route::resource("curso", CursoController::class);
    Route::get("/credencial/{id}/imprimir", [CredencialController::class, "imprimir"]);
    Route::resource("cliente", ClienteController::class);
    Route::resource("pedido", PedidoController::class);
    Route::resource("producto", ProductoController::class);
    Route::resource("proveedor", ProveedorController::class);
    Route::resource("sucursal", SucursalController::class);
    Route::resource('/usuario', UsuarioController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/documento', DocumentoController::class);
});
