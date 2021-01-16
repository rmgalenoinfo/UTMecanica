<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDocentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id','fk_docentes_usuarios')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identificacion_docente', 10)->unique();
            $table->string('nombre_docente', 100);
            $table->string('apellido_docente',100);
            $table->string('correo_docente', 100)->unique();
            $table->string('celular',10)->unique();
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
        Schema::dropIfExists('docentes');
    }
}
