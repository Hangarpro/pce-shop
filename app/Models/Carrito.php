<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    protected $fillable = [
        'carrito'
    ]; 
    public function usuario_id(){
        return $this->hasMany(Carrito_Porductos::class);
        return $this->belongsTo(Usuario::class);
    }
}
