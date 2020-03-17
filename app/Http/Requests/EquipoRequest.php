<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'serial' => 'required|min:3',
            'marca' => 'nullable|min:3',
            'tipo' => 'required|min:3'
        ];
    }

    public function attributes()
    {
        return [
            'serial' => 'Serial',
            'marca' => 'Marca',
            'tipo' => 'Tipo'
        ];
    }
}
