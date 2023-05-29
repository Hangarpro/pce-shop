<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'ventaTotal',
        'usuario_id',
        'carrito_id'
    ];

    public function usuario_id(){
        return $this->belongsTo(Usuario::class, 'id', 'usuario_id');
    }

    public function carrito_id(){
        return $this->belongsTo(Carrito::class, 'id', 'carrito_id');
    }
}
