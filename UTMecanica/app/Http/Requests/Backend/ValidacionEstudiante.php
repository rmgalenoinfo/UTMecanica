<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEstudiante extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'identificacion_estudiante' => 'required|max:10',
            'nombre_estudiante' => 'required|max:100',
            'apellido_estudiante' => 'required|max:100',
            'correo_estudiante' => 'required|max:255',
            'celular_estudiante' => 'required|max:10',
            'periodo' => 'required|max:4',
            'egresado' => 'boolean',
            'graduado' => 'boolean',
            'rechazado' => 'boolean',
            'observaciones' => 'required',
            'condiciones' => 'required',
            'habilitado' => 'boolean',
            'email' => 'required|max:100',
            'password' => 'max:100',
            'fecha_caducidad' => 'required',
            'estado' => 'boolean',
        ];
    }
}
