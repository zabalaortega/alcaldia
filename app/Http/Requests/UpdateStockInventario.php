<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockInventario extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'stock' => 'required|min:1|integer',
            'inventario_id' => 'required|exists:inventarios,id'
        ];
    }

    public function attributes()
    {
        return [
            'stock' => 'Cantidad',
            'inventario_id' => 'Inventario'
        ];
    }
}
