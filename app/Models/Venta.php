<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'ventaTotal'
    ];
    public function usuario_id(){
        return $this->belongsTo(Usuario::class);
    }
    public function carrito_id(){
        return $this->belongsTo(Carrito::class);
    }
}
