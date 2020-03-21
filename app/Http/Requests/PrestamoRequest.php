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
            'empleado_id' => 'required|exists:empleados,id',
            'multimedia_id' => 'required|exists:multimedias,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'hora_prestamo' => 'required|date_format:H:i',
            'hora_devolucion' => 'required|date_format:H:i',
            'descripcion' => 'nullable|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'empleado_id' => 'Empleado',
            'multimedia_id' => 'Multimedia/Herramienta',
            'fecha_prestamo' => 'Fecha Prestamo',
            'fecha_devolucion' => 'Fecha Devolucion',
            'hora_prestamo' => 'Hora Prestamo',
            'hora_devolucion' => 'Hora Devolucion',
            'descripcion' => 'Descripcion',
        ];
    }
}
