<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DependenciaRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'nombre_dependencia' => 'required|min:3|unique:dependencias,nombre_dependencia,'.$this->id_dependencia,
            'descripcion' => 'required|min:3'
        ];
    }

    public function attributes()
    {
        return [
            'nombre_dependencia' => 'Nombre Dependencia',
            'descripcion' => 'Descripcion',
        ];
    }
}
