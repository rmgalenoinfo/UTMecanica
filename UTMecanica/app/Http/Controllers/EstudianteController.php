<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionEstudiante;
use App\Models\Estudiante;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('theme.back.estudiantes.estudiantes', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $roles = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('theme.back.estudiantes.grabar', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionEstudiante $request)
    {
        $lastId = Usuario::max('id');
        if ($lastId == null){
            $lastId = 0;
        }
        $lastid = $lastId + 1;
        $validado = $request->validated();
        dd($validado);
        $usuario = [
            'id'=>$lastId,
            'roles_id'=>$validado['roles_id'],
            'email'=>$validado['email'],
            'password'=>Hash::make($validado['password']),
            'fecha_caducidad'=>$validado['fecha_caducidad'],
            'estado'=>$validado['estado']
        ];
        Usuario::create($usuario);
        $estudiante = [
            'usuario_id'=>$lastId,
            'identificacion_estudiante'=>$validado['identificacion_estudiante'],
            'nombre_estudiante'=>$validado['nombre_estudiante'],
            'apellido_estudiante'=>$validado['identificacion_estudiante'],
            'correo_estudiante'=>$validado['correo_estudiante'],
            'celular_estudiante'=>$validado['celular_estudiante'],
            'periodo'=>$validado['periodo'],
            'egresado'=>$validado['egresado'],
            'graduado'=>$validado['graduado'],
            'rechazado'=>$validado['rechazado'],
            'observaciones'=>$validado['obaservaciones'],
            'condiciones'=>$validado['condiciones'],
            'habilitado'=>$validado['habilitado']
        ];
        Estudiante::create($estudiante);
        return redirect()->route('estudiantes.ficha')->with('mensaje', 'Guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function ficha($id)
    {
        $roles = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Estudiante::with('usuarios')->findOrFail($id);
        return view('theme.back.estudiantes.ficha', compact('data','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Estudiante::with('usuarios')->findOrFail($id);
        return view('theme.back.estudiantes.editar', compact('data','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionEstudiante $request, $id)
    {
        $validado = $request->validated();
        $estud = Estudiante::where('$id','=', $id)->get(array('id'));
        $usuario = [
            'roles_id'=>$validado['roles_id'],
            'email'=>$validado['email'],
            'password'=>$validado['password'],
            'fecha_caducidad'=>$validado['fecha_caducidad'],
            'estado'=>$validado['estado']
        ];
        Usuario::findOrFail($estud->id)->update($usuario);
        $estudiante = [
            'identificacion_estudiante'=>$validado['identificacion_estudiante'],
            'nombre_estudiante'=>$validado['nombre_estudiante'],
            'apellido_estudiante'=>$validado['identificacion_estudiante'],
            'correo_estudiante'=>$validado['correo_estudiante'],
            'celular_estudiante'=>$validado['celular_estudiante'],
            'periodo'=>$validado['periodo'],
            'egresado'=>$validado['egresado'],
            'graduado'=>$validado['graduado'],
            'rechazado'=>$validado['rechazado'],
            'observaciones'=>$validado['obaservaciones'],
            'condiciones'=>$validado['condiciones'],
            'habilitado'=>$validado['habilitado']
        ];
        Estudiante::findOrFail($id)->update($estudiante);
        return redirect()->route('estudiantes.ficha')->with('mensaje', 'Guardado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estud = Estudiante::where('$id','=', $id)->get(array('id'));
        Usuario::destroy($estud->id);
        Estudiante::destroy($id);
        return redirect()->route('estudiantes.ficha')->with('mensaje', 'Guardado correctamente');
    }
}
