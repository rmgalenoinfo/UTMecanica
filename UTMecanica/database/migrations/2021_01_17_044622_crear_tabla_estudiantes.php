<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEstudiantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id','fk_estudiante_usuario')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('indentificacion_estudiante', 10)->unique();
            $table->string('nombre_estudiante', 100);
            $table->string('apellido_estudiante', 100);
            $table->string('correo_estudiante')->unique();
            $table->string('celular_estudiante', 10)->unique();
            $table->char('periodo', 4);
            $table->boolean('egresado')->nullable();
            $table->boolean('graduado')->nullable();
            $table->boolean('rechazado')->nullable();
            $table->text('observaciones');
            $table->text('condiciones');
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
        Schema::dropIfExists('estudiantes');
    }
}
