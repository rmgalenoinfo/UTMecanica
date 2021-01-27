<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionRol;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::all();
        return view('theme.back.roles.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('theme.back.roles.nuevo_rol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionRol $request)
    {
        $validado = $request->validated();
        $rol = $validado['nombre'];
        Rol::create([
           'nombre'=> $rol,
           'slug' => Str::slug($rol,'-')
        ]);
        return redirect()->route('roles.crear')->with('mensaje', 'Guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
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
        $data = Rol::findOrFail($id);
        return view('theme.back.roles.editar_rol', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionRol $request, $id)
    {
        $validado = $request->validated();
        $rol = $validado['nombre'];
        Rol::findOrFail($id)->update([
            'nombre'=> $rol,
           'slug' => Str::slug($rol,'-')
        ]);
        return redirect()->route('roles')->with('mensaje', 'Actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rol::destroy($id);
        return redirect()->route('roles')->with('mensaje', 'Eliminado con exito');
    }
}
