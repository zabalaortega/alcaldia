<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'apellidos' => 'required|min:3',
            'tipo_id' => 'required|exists:tipos,id',
            'dependencia_id' => 'required|exists:dependencias,id',  
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',    
        ];
    }

    public function attributes()
    {
        return [
            'tipo_id' => 'Tipo Empleado',
            'dependencia_id' => 'Dependencia',
            'name' => 'Nombres',
            'apellidos' => 'Apellidos',
            'email' => 'Email',
            'password' => 'Contraseña'
        ];
    }
}
