<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionTipoTemas;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::all();
        return view('theme.back.tipo_temas.tipos_temas', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('theme.back.tipo_temas.grabar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionTipoTemas $request)
    {
        $validado = $request->validated();
        Tipo::create($validado);
        return redirect()->route('tipos', )->with('mensaje', 'Guardado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
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
        $data = Tipo::findOrFail($id);
        return view('theme.back.tipo_temas.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionTipoTemas $request, $id)
    {
        $validado = $request->validated();
        Tipo::findOrFail($id)->update($validado);
        return redirect()->route('tipos', )->with('mensaje', 'Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipo::destroy($id);
        return redirect()->route('tipos', )->with('mensaje', 'Eliminado Correctamente');
    }
}
