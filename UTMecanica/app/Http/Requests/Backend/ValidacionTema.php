<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionTema extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'docentes_id' => 'nullable',
            'tipos_id'=>'required',
            'titulo'=>'required|max:150',
            'decripcion'=>'required',
            'fecha_registro'=>'date',
            'habilitado'=>'boolean'
        ];
    }
}
