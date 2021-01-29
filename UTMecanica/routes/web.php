<?php

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\SubMenuRolController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('theme.back.login');
});

Route::get('Inicio', function () {
    return view('theme.back.inicio');
})->middleware('auth')->name('Inicio');

Route::group(['prefix' => 'administrar', 'middleware' => ['auth', 'administrador']], function() {
    /*Rutas del menú*/
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
    Route::get('menu/crear', [MenuController::class, 'crear'])->name('menu.crear');
    Route::get('menu/{id}/menu_editar', [MenuController::class, 'edit'])->name('menu.menu_editar');
    Route::post('menu', [MenuController::class, 'guardar'])->name('menu.guardar');
    Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('menu/{id}/eliminar', [MenuController::class, 'destroy'])->name('menu.eliminar');
    /* Fin rutas del menú */

    /*Inicio rutas del rol */
    Route::get('roles', [RolController::class, 'index'])->name('roles');
    Route::get('roles/crear', [RolController::class, 'crear'])->name('roles.crear');
    Route::get('roles/{id}/edit', [RolController::class, 'edit'])->name('roles.edit');
    Route::post('roles', [RolController::class, 'guardar'])->name('roles.guardar');
    Route::put('roles/{id}', [RolController::class, 'update'])->name('roles.update');
    Route::delete('roles/{id}/eliminar', [RolController::class, 'destroy'])->name('roles.eliminar');
    /*Fin rutas del rol*/

    /*Rutas del submenú*/
    Route::get('sub_menu', [SubMenuController::class, 'index'])->name('sub_menu');
    Route::get('sub_menu/crear', [SubMenuController::class, 'crear'])->name('sub_menu.crear');
    Route::get('sub_menu/{id}/edit', [SubMenuController::class, 'edit'])->name('sub_menu.edit');
    Route::post('sub_menu', [SubMenuController::class, 'guardar'])->name('sub_menu.guardar');
    Route::put('sub_menu/{id}', [SubMenuController::class, 'update'])->name('sub_menu.update');
    Route::delete('sub_menu/{id}/eliminar', [SubMenuController::class, 'destroy'])->name('sub_menu.eliminar');
    /* Fin rutas del submenú */

    /*Rutas del asignar menu*/
    Route::get('asignar_menu', [SubMenuRolController::class, 'index'])->name('asignar_menu');
    Route::get('asignar_menu/crear', [SubMenuRolController::class, 'crear'])->name('asignar_menu.crear');
    Route::post('asignar_menu', [SubMenuRolController::class, 'guardar'])->name('asignar_menu.guardar');
    Route::delete('asignar_menu/{subMenusId}/{rolesId}/eliminar', [SubMenuRolController::class, 'destroy'])->name('asignar_menu.eliminar');
    /* Fin rutas del asignar menú */
});
