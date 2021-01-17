<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id', 'fk_usuario_roles')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->timestamp('fecha_caducidad');
            $table->boolean('estado');
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
