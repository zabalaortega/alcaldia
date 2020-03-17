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
            'existencia' => 'nullable|min:1'
        ];
    }

    public function attributes()
    {
        return [
            'stock' => 'Stock',
            'existencia' => 'Existencia'
        ];
    }
}
