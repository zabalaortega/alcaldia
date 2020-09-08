<?php

namespace App\Models;

use App\Presenters\MultimediaPresenter;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedias';

    protected $fillable = ['nombre_multimedia', 'marca', 'serial', 'estado', 'observacion'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = ['estado' => 'boolean'];

    public function prestamos()
    {
        return $this->hasMany('App\Models\Prestamo');
    }

    public function devueltos()
    {
        return $this->hasMany('App\Models\Prestamo')
        ->where('estado', 1)
        ->orderBy('created_at', 'DESC');
    }

    public function setNombreMultimediaAttribute($value)
    {
        $this->attributes['nombre_multimedia'] = ucwords($value);
    }

    public function setSerialAttribute($value)
    {
        $this->attributes['serial'] = strtoupper($value);
    }

    public function setTipoAttribute($value)
    {
        $this->attributes['marca'] = ucfirst($value);
    }

    public function present()
    {
        return new MultimediaPresenter($this);
    }

}
