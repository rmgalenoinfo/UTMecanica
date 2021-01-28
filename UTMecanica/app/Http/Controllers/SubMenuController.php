<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionSubMenu;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subMenus = DB::table('sub_menus')
            ->join('menus', 'sub_menus.menus_id', '=', 'menus.id')
            ->select('sub_menus.*', 'menus.menu_nombre')->get();
        return view('theme.back.administracion.sub_menus', compact('subMenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $menus = Menu::orderBy('id')->pluck('menu_nombre', 'id')->toArray();
        return view('theme.back.administracion.grabar_sub_menus', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionSubMenu $request)
    {
        //Valida los datos que es enviado desde el formulario antes de guardar.
        $validado = $request->validated();
        //Guarda los datos enviados desde el formulario en la base de datos
        SubMenu::create($validado);
        //Envia un mensaje que indica que se gurado la información
        return redirect()->route('sub_menu.crear')->with('mensaje', 'Guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function show(SubMenu $subMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::orderBy('id')->pluck('menu_nombre', 'id')->toArray();
        $data = SubMenu::with('menus')->findOrFail($id);
        return view('theme.back.administracion.sub_menu_editar', compact('data', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionSubMenu $request, $id)
    {
        $validado = $request->validated();
        SubMenu::findOrFail($id)->update($validado);
        return redirect()->route('sub_menu')->with('mensaje', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubMenu::destroy($id);
        return redirect()->route('sub_menu')->with('mensaje', 'Eliminado correctamente');
    }
}
