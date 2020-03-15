<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventarioMultimedia extends Model
{
    protected $table = 'inventario_multimedia';

    protected $fillable = ['inventario_id', 'multimedia_id', 'descripcion', 'estado'];

    protected $hidden = ['created_at', 'updated_at'];

    public function multimedia()
    {
        return $this->belongsTo('App\Models\Multimedia');
    }

    public function inventario()
    {
        return $this->belongsTo('App\Models\Inventario');
    }
}
