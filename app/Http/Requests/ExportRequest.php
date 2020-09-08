<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fecha_inicio' => 'required',
            'fecha_final' => 'required|after_or_equal:fecha_inicial'
        ];
    }

    public function attributes()
    {
        return [
            'fecha_inicio' => 'Fecha Inicial',
            'fecha_final' => 'Fecha Final'
        ];
    }
}
