<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEstudiantesTemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes_temas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id','fk_estudiante_temas')->references('id')->on('estudiantes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('temas_id');
            $table->foreign('temas_id','fk_temas_estudiantes')->references('id')->on('temas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('docente_id','fk_temas_docentes')->references('id')->on('docentes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('estudiantes_temas');
    }
}
