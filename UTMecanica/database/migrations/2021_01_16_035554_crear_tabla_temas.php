<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docentes_id');
            $table->foreign('docentes_id','fk_docentes_temas')->references('id')->on('docentes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipos_id');
            $table->foreign('tipos_id','fk_tipos_temas')->references('id')->on('tipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo', 150)->unique();
            $table->text('decripcion');
            $table->dateTime('fecha_registro');
            $table->boolean('habilitado')->default(true);
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
        Schema::dropIfExists('temas');
    }
}
