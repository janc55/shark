<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('cur_nombre');
            $table->string('cur_descripcion');
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_fin')->nullable();
            $table->string('cur_imagen')->nullable();
            $table->bigInteger("cat_id")->unsigned();
            $table->bigInteger("ins_id")->unsigned();

            $table->foreign('cat_id')->references('id')->on('categorias');
            $table->foreign('ins_id')->references('id')->on('instructors');
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
        Schema::dropIfExists('cursos');
    }
}
