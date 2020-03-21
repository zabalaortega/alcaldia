<?php

namespace App\Models;

use App\Presenters\PrestamoPresenter;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'descripcion',
        'fecha_prestamo',
        'fecha_devolucion',
        'hora_prestamo',
        'hora_devolucion',
        'empleado_id',
        'multimedia_id',
        'estado',
    ];

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
        return $this->belongsToMany('App\Models\Proceso')->withTimestamps();
    }

    public function procesoCurrent()
    {
        return $this->belongsToMany('App\Models\Proceso')->wherePivot('estado', 1);
    }

    public function present()
    {
        return new PrestamoPresenter($this);
    }

}
