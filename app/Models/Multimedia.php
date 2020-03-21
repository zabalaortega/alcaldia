<?php

namespace App\Models;

use App\Presenters\MultimediaPresenter;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedias';

    protected $fillable = ['nombre_multimedia', 'tipo', 'serial', 'estado'];

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

    public function stocks()
    {
        return $this->hasMany('App\Models\InventarioMultimedia');
    }

    public function inventarios()
    {
        return $this->belongsToMany('App\Models\Inventario')->withTimestamps();
    }

    public function inventarioCurrent()
    {
        return $this->belongsToMany('App\Models\Inventario')->wherePivot('estado', 1);
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
        $this->attributes['tipo'] = ucfirst($value);
    }

    public function present()
    {
        return new MultimediaPresenter($this);
    }

}
