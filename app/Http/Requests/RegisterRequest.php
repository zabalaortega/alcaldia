<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'apellidos' => 'required|string|min:3',
            'tipo_id' => 'required|exists:tipos,id',
            'dependencia_id' => 'required|exists:dependencias,id',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'apellidos' => 'Apellidos',
            'tipo_id' => 'Tipo Usuario',
            'dependencia_id' => 'Dependencia',
            'email' => 'Email',
            'password' => 'Password'
        ];
    }
}
