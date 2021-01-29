<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionSubMenuRol;
use App\Models\Rol;
use App\Models\SubMenu;
use App\Models\SubMenuRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubMenuRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subMenusRol = DB::table('sub_menus_roles')
            ->join('sub_menus', 'sub_menus_roles.sub_menus_id', '=', 'sub_menus.id')
            ->join('menus','sub_menus.menus_id', '=', 'menus.id')
            ->join('roles', 'sub_menus_roles.roles_id','=','roles.id')
            ->select('sub_menus_roles.*', 'menus.menu_nombre', 'sub_menus.sub_menu_nombre', 'roles.nombre')->get();
        return view('theme.back.administracion.menu_rol', compact('subMenusRol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $subMenus = SubMenu::orderBy('id')->pluck('sub_menu_nombre', 'id')->toArray();
        $roles = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('theme.back.administracion.grabar_menu_rol', compact('subMenus', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionSubMenuRol $request)
    {
        $validado = $request->validated();
        DB::table('sub_menus_roles')->insert($validado);
        return redirect()->route('asignar_menu.crear')->with('mensaje', 'Guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubMenuRol  $subMenuRol
     * @return \Illuminate\Http\Response
     */
    public function show(SubMenuRol $subMenuRol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubMenuRol  $subMenuRol
     * @return \Illuminate\Http\Response
     */
    public function edit(SubMenuRol $subMenuRol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMenuRol  $subMenuRol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubMenuRol $subMenuRol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $subMenusId
     * @param  int $rolesId
     * @return \Illuminate\Http\Response
     */
    public function destroy($subMenusId, $rolesId)
    {
        DB::table('sub_menus_roles')
        ->where('sub_menus_id', '=', $subMenusId)
        ->where('roles_id', '=', $rolesId)->delete();
        return redirect()->route('asignar_menu')->with('mensaje', 'Eliminado correctamente');
    }
}
