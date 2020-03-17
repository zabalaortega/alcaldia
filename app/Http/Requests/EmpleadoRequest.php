<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombres' => 'required|min:3',
            'apellidos' => 'required|min:3',
            'estado' => 'required|min:2'
        ];
    }

    public function attributes()
    {
        return [
            'nombres' => 'Nombre',
            'apellidos' => 'Apellido',
            'estado' => 'Estado'
        ];
    }
}
