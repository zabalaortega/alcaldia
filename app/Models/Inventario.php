<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';

    protected $fillable = ['descripcion', 'stock', 'existencia', 'estado'];

    protected $hidden = ['created_at', 'updated_at'];

    public function multimedias()
    {
        return $this->belongsToMany('App\Models\Multimedia');
    }

    public function multimediasCurrent()
    {
        return $this->belongsToMany('App\Models\Multimedia')->wherePivot('estado', 1);
    }

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = ucwords($value);
    }

}
