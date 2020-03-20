<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultimediaUpdateRequest extends FormRequest
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
            'serial' => 'required|min:3|unique:multimedias,serial,'.$this->id_multimedia,
        ];
    }

    public function attributes()
    {
        return [
            'nombre_multimedia' => 'Herramienta o Multimedia',
            'tipo' => 'Tipo',
            'serial' => 'Serial',
        ];
    }
}
