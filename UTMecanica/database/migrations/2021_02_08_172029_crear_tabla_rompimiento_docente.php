<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRompimientoDocente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rompimiento_docente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docentes_id');
            $table->foreign('docentes_id', 'fk_rompimiento_docente')->references('id')->on('docentes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estudiante_temas_id');
            $table->foreign('estudiante_temas_id', 'fk_rompimiento_temas_d')->references('id')->on('estudiantes_temas')->onDelete('restrict')->onUpdate('restrict');
            $table->text('motivo');
            $table->text('observaciones');
            $table->text('recomendaciones');
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
        Schema::dropIfExists('rompimiento_docente');
    }
}
