<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'apellidos', 
        'tipo_id', 
        'dependencia_id', 
        'estado'
    ];


    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'estado' => 'boolean'
    ];

    protected $appends = ['nombre_completo'];

    public function dependencia()
    {
        return $this->belongsTo('App\Models\Dependencia');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Models\Tipo');
    }

    public function prestamos()
    {
        return $this->hasMany('App\Models\Prestamo');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function setApellidosAttribute($value)
    {
        $this->attributes['apellidos'] = ucwords($value);
    }

    public function getNombreCompletoAttribute()
    {
        return "{$this->name} {$this->apellidos}";
    }

    public function present()
    {
        return new UsuarioPresenter($this);
    }
}
