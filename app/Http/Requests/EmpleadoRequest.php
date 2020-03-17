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
            'tipo_id' => 'required|exists:tipos,id',
            'dependencia_id' => 'required|exists:dependencias,id',
            'nombres' => 'required|min:3',
            'apellidos' => 'required|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'tipo_id' => 'Tipo Empleado',
            'dependencia_id' => 'Dependencia',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
        ];
    }
}
