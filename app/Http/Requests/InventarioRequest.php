<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'stock' => 'required|min:1',
            'descripcion' => 'required|min:3'
        ];
    }

    public function attributes()
    {
        return [
            'stock' => 'Stock',
            'descripcion' => 'Nombre de Inventario'
        ];
    }
}
