<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionSubMenu extends FormRequest
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
            'descripcion' => 'required|max:150',
            'menus_id' => 'required',
            'sub_menu_nombre' => 'required|max:150',
            'icono' => 'required|max:150',
            'url' => 'nullable|max:150',
        ];
    }
}
