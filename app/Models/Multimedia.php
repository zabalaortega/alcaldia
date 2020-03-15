<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedias';
    protected $fillable = ['nombre_multimedia', 'tipo', 'serail', 'estado'];
    protected $hidden = ['created_at', 'updated_at'];
}
