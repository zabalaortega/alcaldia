<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = ['descripcion', 'fecha_entrada', 'empleado_id', 'multimedia_id', 'estado'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = ['estado' => 'boolean'];

    public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado');
    }

    public function multimedia()
    {
        return $this->belongsTo('App\Models\Multimedia');
    }

    public function procesos()
    {
        return $this->belongsToMany('App\Models\Proceso');
    }
}
