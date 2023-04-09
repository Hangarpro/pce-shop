<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'correo',
        'contrasena'
    ];

    protected $hidden = [
        'contrasena'
    ];

    public function direcciones(){
        return $this->hasMany(Direcciones::class);
    }
}
