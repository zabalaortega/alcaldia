<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventarios';

    protected $fillable = ['stock', 'existencia', 'estado'];

    protected $hidden = ['created_at', 'updated_at'];

    public function multimedias()
    {
        return $this->belongsToMany('App\Models\Multimedia');
    }

}
