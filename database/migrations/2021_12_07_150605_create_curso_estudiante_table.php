<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_estudiante', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cur_id')->unsigned();
            $table->bigInteger('est_id')->unsigned();
            $table->foreign('cur_id')->references('id')->on('cursos');
            $table->foreign('est_id')->references('id')->on('estudiantes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_estudiante');
    }
}
