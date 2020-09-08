<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeStatusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'obsercacion' => 'required|min:3'
        ];
    }

    public function attributes()
    {
        return [
            'observacion' => 'Motivo De Baja'
        ];
    }
}
