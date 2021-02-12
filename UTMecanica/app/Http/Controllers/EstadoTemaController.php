<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionEstadoTema;
use App\Models\EstadoTema;
use Illuminate\Http\Request;

class EstadoTemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = EstadoTema::all();
        return view('theme.back.estado_temas.estado_temas', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('theme.back.estado_temas.grabar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionEstadoTema $request)
    {
        $validado = $request->validated();
        EstadoTema::create($validado);
        return redirect()->route('estados', )->with('mensaje', 'Guardado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstadoTema  $estadoTema
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoTema $estadoTema)
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
        $data = EstadoTema::findOrFail($id);
        return view('theme.back.estado_temas.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionEstadoTema $request, $id)
    {
        $validado = $request->validated();
        EstadoTema::findOrFail($id) ->update($validado);
        return redirect()->route('estados', )->with('mensaje', 'Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EstadoTema::destroy($id);
        return redirect()->route('estados', )->with('mensaje', 'Eliminado Correctamente');
    }
}
