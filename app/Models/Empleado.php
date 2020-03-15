<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'tipo_id',
        'dependencia_id',
        'nombres',
        'apellidos',
        'estado'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = ['estado' => 'boolean'];

    public function dependencia()
    {
        return $this->belongsTo('App\Models\Dependencia');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Models\Tipo');
    }

    public function equipos()
    {
        return $this->belongsToMany('App\Models\Equipo');
    }

}
