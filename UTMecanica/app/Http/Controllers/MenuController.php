<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //llama toda la lista de menus de la base de datos
        $menus = Menu::all();
        //muestra la vista de la tabla de los menus
        return view('theme.back.administracion.menus', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //muestra la vista para crear un nuevo menu
        return view('theme.back.administracion.grabar_menus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionMenu $request)
    {
        //Valida los datos que es enviado desde el formulario antes de guardar.
        $validado = $request->validated();
        //Guarda los datos enviados desde el formulario en la base de datos
        Menu::create($validado);
        //Envia un mensaje que indica que se gurado la información
        return redirect()->route('menu.crear')->with('mensaje', 'Guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
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
        //Buaca el menu que se va a editar
        $data = Menu::findOrFail($id);
        //Mustra la ventana la para editar el menu
        return view('theme.back.administracion.menu_editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionMenu $request, $id)
    {
        //Primero valida la información editada y despues edita en la base de datos
        Menu::findOrFail($id)->update($request->validated());
        //Envia un mensaje despues de editar la información en la base de datos.
        return redirect()->route('menu')->with('mensaje', 'Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //elimina la información de la base de datos
        Menu::destroy($id);
        //Envia un mensaje confirmando que la información a sido eliminada.
        return redirect()->route('menu')->with('mensaje', 'Eliminado con exito');
    }
}
