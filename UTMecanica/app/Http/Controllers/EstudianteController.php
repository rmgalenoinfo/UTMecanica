<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionEstudiante;
use App\Models\Estudiante;
use App\Models\Usuario;
use ErrorException;
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
        $requerido = true;
        return view('theme.back.estudiantes.grabar', compact('requerido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionEstudiante $request)
    {
        $egresado = 0;
        $graduado = 0;
        $rechazado = 0;
        $habilitado = 0;
        $estado = 0;
        $lastId = Usuario::max('id');
        if ($lastId == null){
            $lastId = 0;
        }
        $lastId = $lastId + 1;
        $validado = $request->validated();
        try{
            $egresado = $validado['egresado'];
        } catch (ErrorException $e){
            $egresado = 0;
        }
        try{
            $graduado = $validado['graduado'];
        } catch (ErrorException $e){
            $graduado = 0;
        }
        try{
            $rechazado = $validado['rechazado'];
        } catch (ErrorException $e){
            $rechazado = 0;
        }
        try{
            $habilitado = $validado['habilitado'];
        } catch (ErrorException $e){
            $habilitado = 0;
        }
        try{
            $estado = $validado['estado'];
        } catch (ErrorException $e){
            $estado = 0;
        }
        $usuario = [
            'id'=>$lastId,
            'roles_id'=>5,
            'email'=>$validado['email'],
            'password'=>Hash::make($validado['password']),
            'fecha_caducidad'=>$validado['fecha_caducidad'],
            'estado'=>$estado
        ];
        Usuario::create($usuario);
        $estudiante = [
            'usuario_id'=>$lastId,
            'indentificacion_estudiante'=>$validado['identificacion_estudiante'],
            'nombre_estudiante'=>$validado['nombre_estudiante'],
            'apellido_estudiante'=>$validado['apellido_estudiante'],
            'correo_estudiante'=>$validado['correo_estudiante'],
            'celular_estudiante'=>$validado['celular_estudiante'],
            'periodo'=>$validado['periodo'],
            'egresado'=>$egresado,
            'graduado'=>$graduado,
            'rechazado'=>$rechazado,
            'observaciones'=>$validado['observaciones'],
            'condiciones'=>$validado['condiciones'],
            'habilitado'=>$habilitado
        ];
        Estudiante::create($estudiante);
        return redirect()->route('estudiantes', )->with('mensaje', 'Guardado Correctamente');
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
        $data = Estudiante::with('usuario')->findOrFail($id);
        $date = date('Y-m-d', strtotime($data->usuario->fecha_caducidad));
        $usuario = $data->usuario;
        $usuario['fecha_caducidad'] = $date;
        $data['usuario'] = $usuario;
        return view('theme.back.estudiantes.ficha', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Estudiante::with('usuario')->findOrFail($id);
        $date = date('Y-m-d', strtotime($data->usuario->fecha_caducidad));
        $usuario = $data -> usuario;
        $usuario['fecha_caducidad'] = $date;
        $data['usuario'] = $usuario;
        $requerido = false;
        return view('theme.back.estudiantes.editar', compact('data', 'requerido'));
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
        $egresado = 0;
        $graduado = 0;
        $rechazado = 0;
        $habilitado = 0;
        $estado = 0;
        $validado = $request->validated();
        $password = '';
        $estud = Estudiante::where('id','=', $id)->get('usuario_id');
        try{
            $egresado = $validado['egresado'];
        } catch (ErrorException $e){
            $egresado = 0;
        }
        try{
            $graduado = $validado['graduado'];
        } catch (ErrorException $e){
            $graduado = 0;
        }
        try{
            $rechazado = $validado['rechazado'];
        } catch (ErrorException $e){
            $rechazado = 0;
        }
        try{
            $habilitado = $validado['habilitado'];
        } catch (ErrorException $e){
            $habilitado = 0;
        }
        try{
            $estado = $validado['estado'];
        } catch (ErrorException $e){
            $estado = 0;
        }
        try{
            $password = $validado['password'];
        } catch (ErrorException $e){
            $password = '';
        }
        if ($password == ''){
            $usuario = [
                'email'=>$validado['email'],
                'fecha_caducidad'=>$validado['fecha_caducidad'],
                'estado'=>$estado
            ];
        } else {
            $usuario = [
                'email'=>$validado['email'],
                'password'=>Hash::make($validado['password']),
                'fecha_caducidad'=>$validado['fecha_caducidad'],
                'estado'=>$estado
            ];
        }
        Usuario::findOrFail($estud[0]->usuario_id)->update($usuario);
        $estudiante = [
            'indentificacion_estudiante'=>$validado['identificacion_estudiante'],
            'nombre_estudiante'=>$validado['nombre_estudiante'],
            'apellido_estudiante'=>$validado['apellido_estudiante'],
            'correo_estudiante'=>$validado['correo_estudiante'],
            'celular_estudiante'=>$validado['celular_estudiante'],
            'periodo'=>$validado['periodo'],
            'egresado'=>$egresado,
            'graduado'=>$graduado,
            'rechazado'=>$rechazado,
            'observaciones'=>$validado['observaciones'],
            'condiciones'=>$validado['condiciones'],
            'habilitado'=>$habilitado
        ];
        Estudiante::findOrFail($id)->update($estudiante);
        return redirect()->route('estudiantes.ficha', $id)->with('mensaje', 'Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estud = Estudiante::where('id','=', $id)->get('usuario_id');
        Estudiante::destroy($id);
        Usuario::destroy($estud[0]->usuario_id);
        return redirect()->route('estudiantes')->with('mensaje', 'Se elimino el estudiante correctamente');
    }
}
