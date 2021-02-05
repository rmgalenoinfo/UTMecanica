<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\ValidacionDocente;
use App\Models\Docente;
use App\Models\Rol;
use App\Models\Usuario;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::all();
        return view('theme.back.docentes.docentes', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $roles = Rol::where('id','<',5)->orderBy('id')->pluck('nombre', 'id')->toArray();
        $requerido = true;
        return view('theme.back.docentes.grabar', compact('roles','requerido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionDocente $request)
    {
        $habilitado = 0;
        $estado = 0;
        $lastId = Usuario::max('id');
        if ($lastId == null){
            $lastId = 0;
        }
        $lastId = $lastId + 1;
        $validado = $request->validated();
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
            'roles_id'=>$validado['roles_id'],
            'email'=>$validado['email'],
            'password'=>Hash::make($validado['password']),
            'fecha_caducidad'=>$validado['fecha_caducidad'],
            'estado'=>$estado
        ];
        Usuario::create($usuario);
        $docente = [
            'usuario_id'=>$lastId,
            'identificacion_docente'=>$validado['identificacion_docente'],
            'nombre_docente'=>$validado['nombre_docente'],
            'apellido_docente'=>$validado['apellido_docente'],
            'correo_docente'=>$validado['correo_docente'],
            'celular'=>$validado['celular'],
            'habilitado'=>$habilitado
        ];
        Docente::create($docente);
        return redirect()->route('docentes')->with('mensaje', 'Guardado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
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
        $roles = Rol::where('id','<',5)->orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Docente::with('usuario')->findOrFail($id);
        $date = date('Y-m-d', strtotime($data->usuario->fecha_caducidad));
        $usuario = $data -> usuario;
        $usuario['fecha_caducidad'] = $date;
        $data['usuario'] = $usuario;
        return view('theme.back.docentes.ficha', compact('roles','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Rol::where('id','<',5)->orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Docente::with('usuario')->findOrFail($id);
        $date = date('Y-m-d', strtotime($data->usuario->fecha_caducidad));
        $usuario = $data -> usuario;
        $usuario['fecha_caducidad'] = $date;
        $data['usuario'] = $usuario;
        $requerido = false;
        return view('theme.back.docentes.editar', compact('roles','data', 'requerido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionDocente $request, $id)
    {
        $habilitado = 0;
        $estado = 0;
        $validado = $request->validated();
        $password = '';
        $docen = Docente::where('id','=', $id)->get('usuario_id');

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
        Usuario::findOrFail($docen[0]->usuario_id)->update($usuario);
        $estudiante = [
            'identificacion_docente'=>$validado['identificacion_docente'],
            'nombre_docente'=>$validado['nombre_docente'],
            'apellido_docente'=>$validado['apellido_docente'],
            'correo_docente'=>$validado['correo_docente'],
            'celular'=>$validado['celular'],
            'habilitado'=>$habilitado
        ];
        Docente::findOrFail($id)->update($estudiante);
        return redirect()->route('docentes.ficha', $id)->with('mensaje', 'Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estud = Docente::where('id','=', $id)->get('usuario_id');
        Docente::destroy($id);
        Usuario::destroy($estud[0]->usuario_id);
        return redirect()->route('docentes')->with('mensaje', 'Se elimino al correctamente');
    }
}
