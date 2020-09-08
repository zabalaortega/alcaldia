<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestamoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'multimedia_id' => 'required|exists:multimedias,id',
            'observacion' => 'required|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'multimedia_id' => 'Multimedia/Herramienta',
            'observacion' => 'Motivo',
        ];
    }
}
