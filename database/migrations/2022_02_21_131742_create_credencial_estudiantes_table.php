<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredencialEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credencial_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string("nombres");
            $table->string("apellido_paterno")->nullable();
            $table->string("apellido_materno");
            $table->string("cod_est");
            $table->string("carrera");
            $table->string("cedula_identidad");
            $table->string("ciudad")->nullable();
            $table->date("fecha_nacimiento");
            $table->string("tipo_sangre")->nullable();
            $table->string("correo")->nullable();
            $table->string("celular")->nullable();
            $table->string("imagen")->nullable();
            $table->string("enlace_qr")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credencial_estudiantes');
    }
}
