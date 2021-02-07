<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionTema;
use App\Models\Docente;
use App\Models\Tema;
use App\Models\Tipo;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temas = Tema::all();
        return view('theme.back.temas.temas', compact('temas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $docentes = Docente::orderBy('id')->select(['id', 'apellido_docente', 'nombre_docente'])->get();
        $tipos = Tipo::orderBy('id')->pluck('tipo_tema', 'id')->toArray();
        return view('theme.back.temas.grabar', compact('docentes','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionTema $request)
    {
        $validado = $request->validated();
        $habilitado = 0;
        try {
            $habilitado = $validado['habilitado'];
        } catch (ErrorException $e) {
            $habilitado = 0;
        }
        $fechaActual = date('Y-m-d');
        Tema::create([
            'docentes_id' => $validado['docentes_id'],
            'tipos_id'=>$validado['tipos_id'],
            'titulo'=> $validado['titulo'],
            'decripcion'=> $validado['decripcion'],
            'fecha_registro'=> $fechaActual,
            'habilitado'=> $habilitado
        ]);
        redirect()->route('temas', )->with('mensaje', 'Guardado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
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
        $docentes = Docente::orderBy('id')->select(['id', 'apellido_docente', 'nombre_docente'])->get();
        $tipos = Tipo::orderBy('id')->pluck('tipo_tema', 'id')->toArray();
        $data = Tema::findOrFail($id);
        return view('theme.back.temas.editar', compact('data','docentes','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionTema $request, $id)
    {
        $validado = $request->validated();
        $habilitado = 0;
        try {
            $habilitado = $validado['habilitado'];
        } catch (ErrorException $e) {
            $habilitado = 0;
        }
        Tema::findOrFail($id)->update([
            'docentes_id' => $validado['docentes_id'],
            'tipos_id'=>$validado['tipos_id'],
            'titulo'=> $validado['titulo'],
            'decripcion'=> $validado['decripcion'],
            'habilitado'=> $habilitado
        ]);
        redirect()->route('temas', )->with('mensaje', 'Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tema::destroy($id);
        redirect()->route('temas', )->with('mensaje', 'Eliminado Correctamente');
    }
}
