<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedias';
    protected $fillable = ['nombre', 'cantidad'];
    protected $hidden = ['created_at', 'updated_at'];
}
