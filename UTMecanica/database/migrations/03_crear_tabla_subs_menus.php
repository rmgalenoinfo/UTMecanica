<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSubsMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subs_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menus_id');
            $table->foreign('menus_id', 'fk_sub_menu_menu')->references('id')->on('menus')->onDelete('restrict')->onUpdate('restrict');
            $table->string('descripcion', 150);
            $table->string('sub_menu', 150)->unique();
            $table->string('url', 150)->unique();
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
        Schema::dropIfExists('subs_menus');
    }
}
