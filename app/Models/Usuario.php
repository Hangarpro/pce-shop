<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticable;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'correo',
        'contrasena',
        'rol'
    ];

    protected $hidden = [
        'contrasena'
    ];

    public function getAuthPassword(){
        return $this->contrasena;
    }

    public function direcciones(){
        return $this->hasMany(Direcciones::class);
    }
}
