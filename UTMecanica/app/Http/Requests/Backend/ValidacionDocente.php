<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionDocente extends FormRequest
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
            'identificacion_docente' => 'required|max:10',
            'nombre_docente' => 'required|max:100',
            'apellido_docente' => 'required|max:100',
            'correo_docente' => 'required|max:100',
            'celular' => 'required|max:10',
            'habilitado' => 'boolean',
            'roles_id' => 'required',
            'email' => 'required|max:100',
            'password' => 'required|max:100',
            'fecha_caducidad' => 'required',
            'estado' => 'boolean'
        ];
    }
}
