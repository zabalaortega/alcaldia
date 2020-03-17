<?php

namespace App\Models;

use App\Presenters\EmpleadoPresenter;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'tipo_id',
        'dependencia_id',
        'nombres',
        'apellidos',
        'estado',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = ['estado' => 'boolean'];

    protected $appends = ['nombre_completo'];

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

    public function setNombresAttribute($value)
    {
        $this->attributes['nombres'] = ucwords($value);
    }

    public function setApellidosAttribute($value)
    {
        $this->attributes['apellidos'] = ucwords($value);
    }

    public function getNombreCompletoAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }

    public function present()
    {
        return new EmpleadoPresenter($this);
    }

}
