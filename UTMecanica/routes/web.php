<?php

use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstadoTemaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EstudianteTemaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\SubMenuRolController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\TipoController;
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

/* Rutas del menus del rol administrador */
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

    /*Inicio rutas del estudiantes */
    Route::get('estudiantes', [EstudianteController::class, 'index'])->name('estudiantes');
    Route::get('estudiantes/crear', [EstudianteController::class, 'crear'])->name('estudiantes.crear');
    Route::get('estudiantes/{id}/ficha', [EstudianteController::class, 'ficha'])->name('estudiantes.ficha');
    Route::get('estudiantes/{id}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
    Route::post('estudiantes', [EstudianteController::class, 'guardar'])->name('estudiantes.guardar');
    Route::put('estudiantes/{id}', [EstudianteController::class, 'update'])->name('estudiantes.update');
    Route::delete('estudiantes/{id}/eliminar', [EstudianteController::class, 'destroy'])->name('estudiantes.eliminar');
    /*Fin rutas del estudiantes*/

    /*Inicio rutas del docentes */
    Route::get('docentes', [DocenteController::class, 'index'])->name('docentes');
    Route::get('docentes/crear', [DocenteController::class, 'crear'])->name('docentes.crear');
    Route::get('docentes/{id}/ficha', [DocenteController::class, 'ficha'])->name('docentes.ficha');
    Route::get('docentes/{id}/edit', [DocenteController::class, 'edit'])->name('docentes.edit');
    Route::post('docentes', [DocenteController::class, 'guardar'])->name('docentes.guardar');
    Route::put('docentes/{id}', [DocenteController::class, 'update'])->name('docentes.update');
    Route::delete('docentes/{id}/eliminar', [DocenteController::class, 'destroy'])->name('docentes.eliminar');
    /*Fin rutas del docentes*/

    /*Inicio rutas del estados */
    Route::get('estados', [EstadoTemaController::class, 'index'])->name('estados');
    Route::get('estados/crear', [EstadoTemaController::class, 'crear'])->name('estados.crear');
    Route::get('estados/{id}/edit', [EstadoTemaController::class, 'edit'])->name('estados.edit');
    Route::post('estados', [EstadoTemaController::class, 'guardar'])->name('estados.guardar');
    Route::put('estados/{id}', [EstadoTemaController::class, 'update'])->name('estados.update');
    Route::delete('estados/{id}/eliminar', [EstadoTemaController::class, 'destroy'])->name('estados.eliminar');
    /*Fin rutas del estados */

    /*Inicio rutas del tipos */
    Route::get('tipos', [TipoController::class, 'index'])->name('tipos');
    Route::get('tipos/crear', [TipoController::class, 'crear'])->name('tipos.crear');
    Route::get('tipos/{id}/edit', [TipoController::class, 'edit'])->name('tipos.edit');
    Route::post('tipos', [TipoController::class, 'guardar'])->name('tipos.guardar');
    Route::put('tipos/{id}', [TipoController::class, 'update'])->name('tipos.update');
    Route::delete('tipos/{id}/eliminar', [TipoController::class, 'destroy'])->name('tipos.eliminar');
    /*Fin rutas del tipos */

    /*Inicio rutas del temas */
    Route::get('temas', [TemaController::class, 'index'])->name('temas');
    Route::get('temas/crear', [TemaController::class, 'crear'])->name('temas.crear');
    Route::get('temas/{id}/edit', [TemaController::class, 'edit'])->name('temas.edit');
    Route::post('temas', [TemaController::class, 'guardar'])->name('temas.guardar');
    Route::put('temas/{id}', [TemaController::class, 'update'])->name('temas.update');
    Route::delete('temas/{id}/eliminar', [TemaController::class, 'destroy'])->name('temas.eliminar');
    /*Fin rutas del temas */

    /*Inicio rutas del estudiantes temas */
    Route::get('estudiantes_temas', [EstudianteTemaController::class, 'index'])->name('estudiantes_temas');
    Route::get('estudiantes_temas/crear', [EstudianteTemaController::class, 'crear'])->name('estudiantes_temas.crear');
    Route::get('estudiantes_temas/{id}/edit', [EstudianteTemaController::class, 'edit'])->name('estudiantes_temas.edit');
    Route::post('estudiantes_temas', [EstudianteTemaController::class, 'guardar'])->name('estudiantes_temas.guardar');
    Route::put('estudiantes_temas/{id}', [EstudianteTemaController::class, 'update'])->name('estudiantes_temas.update');
    Route::delete('estudiantes_temas/{id}/eliminar', [EstudianteTemaController::class, 'destroy'])->name('estudiantes_temas.eliminar');
    /*Fin rutas del temas */

});

/* Rutas del menus del rol coordinador */
Route::group(['prefix' => 'coordinar', 'middleware' => ['auth', 'coordinador']], function() {

    /*Inicio rutas del estudiantes */
    Route::get('estudiantes', [EstudianteController::class, 'index'])->name('estudiantes');
    Route::get('estudiantes/crear', [EstudianteController::class, 'crear'])->name('estudiantes.crear');
    Route::get('estudiantes/{id}/ficha', [EstudianteController::class, 'ficha'])->name('estudiantes.ficha');
    Route::get('estudiantes/{id}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
    Route::post('estudiantes', [EstudianteController::class, 'guardar'])->name('estudiantes.guardar');
    Route::put('estudiantes/{id}', [EstudianteController::class, 'update'])->name('estudiantes.update');
    Route::delete('estudiantes/{id}/eliminar', [EstudianteController::class, 'destroy'])->name('estudiantes.eliminar');
    /*Fin rutas del estudiantes*/

    /*Inicio rutas del docentes */
    Route::get('docentes', [DocenteController::class, 'index'])->name('docentes');
    Route::get('docentes/crear', [DocenteController::class, 'crear'])->name('docentes.crear');
    Route::get('docentes/{id}/ficha', [DocenteController::class, 'ficha'])->name('docentes.ficha');
    Route::get('docentes/{id}/edit', [DocenteController::class, 'edit'])->name('docentes.edit');
    Route::post('docentes', [DocenteController::class, 'guardar'])->name('docentes.guardar');
    Route::put('docentes/{id}', [DocenteController::class, 'update'])->name('docentes.update');
    Route::delete('docentes/{id}/eliminar', [DocenteController::class, 'destroy'])->name('docentes.eliminar');
    /*Fin rutas del docentes*/

    /*Inicio rutas del estados */
    Route::get('estados', [EstadoTemaController::class, 'index'])->name('estados');
    Route::get('estados/crear', [EstadoTemaController::class, 'crear'])->name('estados.crear');
    Route::get('estados/{id}/edit', [EstadoTemaController::class, 'edit'])->name('estados.edit');
    Route::post('estados', [EstadoTemaController::class, 'guardar'])->name('estados.guardar');
    Route::put('estados/{id}', [EstadoTemaController::class, 'update'])->name('estados.update');
    Route::delete('estados/{id}/eliminar', [EstadoTemaController::class, 'destroy'])->name('estados.eliminar');
    /*Fin rutas del estados */

    /*Inicio rutas del tipos */
    Route::get('tipos', [TipoController::class, 'index'])->name('tipos');
    Route::get('tipos/crear', [TipoController::class, 'crear'])->name('tipos.crear');
    Route::get('tipos/{id}/edit', [TipoController::class, 'edit'])->name('tipos.edit');
    Route::post('tipos', [TipoController::class, 'guardar'])->name('tipos.guardar');
    Route::put('tipos/{id}', [TipoController::class, 'update'])->name('tipos.update');
    Route::delete('tipos/{id}/eliminar', [TipoController::class, 'destroy'])->name('tipos.eliminar');
    /*Fin rutas del tipos */

    /*Inicio rutas del temas */
    Route::get('temas', [TemaController::class, 'index'])->name('temas');
    Route::get('temas/crear', [TemaController::class, 'crear'])->name('temas.crear');
    Route::get('temas/{id}/edit', [TemaController::class, 'edit'])->name('temas.edit');
    Route::post('temas', [TemaController::class, 'guardar'])->name('temas.guardar');
    Route::put('temas/{id}', [TemaController::class, 'update'])->name('temas.update');
    Route::delete('temas/{id}/eliminar', [TemaController::class, 'destroy'])->name('temas.eliminar');
    /*Fin rutas del temas */

    /*Inicio rutas del estudiantes temas */
    Route::get('estudiantes_temas', [EstudianteTemaController::class, 'index'])->name('estudiantes_temas');
    Route::get('estudiantes_temas/crear', [EstudianteTemaController::class, 'crear'])->name('estudiantes_temas.crear');
    Route::get('estudiantes_temas/{id}/edit', [EstudianteTemaController::class, 'edit'])->name('estudiantes_temas.edit');
    Route::post('estudiantes_temas', [EstudianteTemaController::class, 'guardar'])->name('estudiantes_temas.guardar');
    Route::put('estudiantes_temas/{id}', [EstudianteTemaController::class, 'update'])->name('estudiantes_temas.update');
    Route::delete('estudiantes_temas/{id}/eliminar', [EstudianteTemaController::class, 'destroy'])->name('estudiantes_temas.eliminar');
    /*Fin rutas del temas */

});

/* Rutas del menus del rol docentes */
Route::group(['prefix' => 'coordinar', 'middleware' => ['auth', 'docentes']], function() {

    /*Inicio rutas del estudiantes */
    Route::get('estudiantes', [EstudianteController::class, 'index'])->name('estudiantes');
    Route::get('estudiantes/crear', [EstudianteController::class, 'crear'])->name('estudiantes.crear');
    Route::get('estudiantes/{id}/ficha', [EstudianteController::class, 'ficha'])->name('estudiantes.ficha');
    Route::get('estudiantes/{id}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
    Route::post('estudiantes', [EstudianteController::class, 'guardar'])->name('estudiantes.guardar');
    Route::put('estudiantes/{id}', [EstudianteController::class, 'update'])->name('estudiantes.update');
    Route::delete('estudiantes/{id}/eliminar', [EstudianteController::class, 'destroy'])->name('estudiantes.eliminar');
    /*Fin rutas del estudiantes*/

    /*Inicio rutas del temas */
    Route::get('temas', [TemaController::class, 'index'])->name('temas');
    Route::get('temas/crear', [TemaController::class, 'crear'])->name('temas.crear');
    Route::get('temas/{id}/edit', [TemaController::class, 'edit'])->name('temas.edit');
    Route::post('temas', [TemaController::class, 'guardar'])->name('temas.guardar');
    Route::put('temas/{id}', [TemaController::class, 'update'])->name('temas.update');
    Route::delete('temas/{id}/eliminar', [TemaController::class, 'destroy'])->name('temas.eliminar');
    /*Fin rutas del temas */

    /*Inicio rutas del estudiantes temas */
    Route::get('estudiantes_temas', [EstudianteTemaController::class, 'index'])->name('estudiantes_temas');
    Route::get('estudiantes_temas/crear', [EstudianteTemaController::class, 'crear'])->name('estudiantes_temas.crear');
    Route::get('estudiantes_temas/{id}/edit', [EstudianteTemaController::class, 'edit'])->name('estudiantes_temas.edit');
    Route::post('estudiantes_temas', [EstudianteTemaController::class, 'guardar'])->name('estudiantes_temas.guardar');
    Route::put('estudiantes_temas/{id}', [EstudianteTemaController::class, 'update'])->name('estudiantes_temas.update');
    Route::delete('estudiantes_temas/{id}/eliminar', [EstudianteTemaController::class, 'destroy'])->name('estudiantes_temas.eliminar');
    /*Fin rutas del temas */

});

/* Rutas del menus del rol tutor */
Route::group(['prefix' => 'coordinar', 'middleware' => ['auth', 'tutor']], function() {

    /*Inicio rutas del estudiantes */
    Route::get('estudiantes', [EstudianteController::class, 'index'])->name('estudiantes');
    Route::get('estudiantes/crear', [EstudianteController::class, 'crear'])->name('estudiantes.crear');
    Route::get('estudiantes/{id}/ficha', [EstudianteController::class, 'ficha'])->name('estudiantes.ficha');
    Route::get('estudiantes/{id}/edit', [EstudianteController::class, 'edit'])->name('estudiantes.edit');
    Route::post('estudiantes', [EstudianteController::class, 'guardar'])->name('estudiantes.guardar');
    Route::put('estudiantes/{id}', [EstudianteController::class, 'update'])->name('estudiantes.update');
    Route::delete('estudiantes/{id}/eliminar', [EstudianteController::class, 'destroy'])->name('estudiantes.eliminar');
    /*Fin rutas del estudiantes*/

    /*Inicio rutas del temas */
    Route::get('temas', [TemaController::class, 'index'])->name('temas');
    Route::get('temas/crear', [TemaController::class, 'crear'])->name('temas.crear');
    Route::get('temas/{id}/edit', [TemaController::class, 'edit'])->name('temas.edit');
    Route::post('temas', [TemaController::class, 'guardar'])->name('temas.guardar');
    Route::put('temas/{id}', [TemaController::class, 'update'])->name('temas.update');
    Route::delete('temas/{id}/eliminar', [TemaController::class, 'destroy'])->name('temas.eliminar');
    /*Fin rutas del temas */

    /*Inicio rutas del estudiantes temas */
    Route::get('estudiantes_temas', [EstudianteTemaController::class, 'index'])->name('estudiantes_temas');
    Route::get('estudiantes_temas/crear', [EstudianteTemaController::class, 'crear'])->name('estudiantes_temas.crear');
    Route::get('estudiantes_temas/{id}/edit', [EstudianteTemaController::class, 'edit'])->name('estudiantes_temas.edit');
    Route::post('estudiantes_temas', [EstudianteTemaController::class, 'guardar'])->name('estudiantes_temas.guardar');
    Route::put('estudiantes_temas/{id}', [EstudianteTemaController::class, 'update'])->name('estudiantes_temas.update');
    Route::delete('estudiantes_temas/{id}/eliminar', [EstudianteTemaController::class, 'destroy'])->name('estudiantes_temas.eliminar');
    /*Fin rutas del temas */

});

/* Rutas del menus del rol estudiante */
Route::group(['prefix' => 'coordinar', 'middleware' => ['auth', 'estudiante']], function() {

    /*Inicio rutas del estudiantes temas */
    Route::get('estudiantes_temas', [EstudianteTemaController::class, 'index'])->name('estudiantes_temas');
    Route::get('estudiantes_temas/crear', [EstudianteTemaController::class, 'crear'])->name('estudiantes_temas.crear');
    Route::get('estudiantes_temas/{id}/edit', [EstudianteTemaController::class, 'edit'])->name('estudiantes_temas.edit');
    Route::post('estudiantes_temas', [EstudianteTemaController::class, 'guardar'])->name('estudiantes_temas.guardar');
    Route::put('estudiantes_temas/{id}', [EstudianteTemaController::class, 'update'])->name('estudiantes_temas.update');
    Route::delete('estudiantes_temas/{id}/eliminar', [EstudianteTemaController::class, 'destroy'])->name('estudiantes_temas.eliminar');
    /*Fin rutas del temas */

});
