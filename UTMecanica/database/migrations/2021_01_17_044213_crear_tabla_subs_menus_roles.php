<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSubsMenusRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subs_menus_roles', function (Blueprint $table) {
           $table->unsignedBigInteger('sub_menus_id');
           $table->foreign('sub_menus_id','fk_sub_menus_roles')->references('id')->on('sub_menus')->onDelete('restrict')->onUpdate('restrict');
           $table->unsignedBigInteger('roles_id');
           $table->foreign('roles_id', 'fk_roles_sub_menus')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subs_menus_roles');
    }
}
