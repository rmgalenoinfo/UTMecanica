<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionEstudianteTema;
use App\Models\Docente;
use App\Models\EstadoTema;
use App\Models\EstudianteTema;
use App\Models\Tema;
use Illuminate\Http\Request;

class EstudianteTemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantesTemas = EstudianteTema::with('estudiante')->with('docente')->with('tema')->with('estadoTema')
                                ->select('estudiantes_temas.id','nombre_estudiante', 'apellido_estudiante',
                                'nombre_docente', 'apellido_docente', 'titulo', 'estado_tema')->get();
        return view('theme.back.estudiantes_temas.estudiantes_temas', compact('estudiantesTemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $estudiantes = Docente::orderBy('id')->select(['id', 'apellido_estudiante', 'nombre_estudiante'])->get();
        $docentes = Docente::orderBy('id')->select(['id', 'apellido_docente', 'nombre_docente'])->get();
        $estados= EstadoTema::orderBy('id')->pluck('titulo', 'id')->toArray();
        $temas= Tema::orderBy('id')->pluck('estado_tema', 'id')->toArray();
        return view('theme.back.estudiantes_temas.grabar', compact('estudiantes', 'docentes', 'estados', 'temas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionEstudianteTema $request)
    {
        $validado = $request->validated();
        EstudianteTema::create($validado);
        return redirect()->route('estudiantes_temas')->with('mensaje', 'Guardado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstudianteTema  $estudianteTema
     * @return \Illuminate\Http\Response
     */
    public function show(EstudianteTema $estudianteTema)
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
        $data = EstudianteTema::findOrFail($id);
        $estudiantes = Docente::orderBy('id')->select(['id', 'apellido_estudiante', 'nombre_estudiante'])->get();
        $docentes = Docente::orderBy('id')->select(['id', 'apellido_docente', 'nombre_docente'])->get();
        $estados= EstadoTema::orderBy('id')->pluck('titulo', 'id')->toArray();
        $temas= Tema::orderBy('id')->pluck('estado_tema', 'id')->toArray();
        return view('theme.back.estudiantes_temas.editar', compact('data', 'estudiantes', 'docentes', 'estados', 'temas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionEstudianteTema $request, $id)
    {
        $validado = $request->validated();
        EstudianteTema::findOrFail($id)->update($validado);
        return redirect()->route('estudiantes_temas')->with('mensaje', 'Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EstudianteTema::destroy($id);
        return redirect()->route('estudiantes_temas')->with('mensaje', 'Eliminado Correctamente');
    }
}
