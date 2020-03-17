<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultimediasRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_multimedia' => 'required|min:3',
            'tipo' => 'required|min:3',
            'serial' => 'required|min:3'
        ];
    }

    public function attributes()
    {
        return [
            'nombre_multimedia' => 'Nombre Multimedia',
            'tipo' => 'Tipo',
            'serial' => 'Serial'
        ];
    }
    
}
