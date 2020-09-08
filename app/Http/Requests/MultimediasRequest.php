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
            'marca' => 'required|min:3',
            'serial' => 'required|min:3|unique:multimedias,serial,'.$this->id_multimedia
        ];
    }

    public function attributes()
    {
        return [
            'nombre_multimedia' => 'Marca',
            'marca' => 'Modelo',
            'serial' => 'Serial'
        ];
    }
    
}
