<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = "compra";

    protected $fillable = [
        'producto_id',
        'carrito_id',
        'cantidad',
        'monto'
    ]; 

    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function carrito_id(){
        return $this->belongsTo(Carrito::class);
    }
}
