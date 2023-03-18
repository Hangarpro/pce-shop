<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito_Productos extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
    ]; 
    public function producto_id(){
        return $this->belongsTo(Producto::class);
    }
    public function carrito_id(){
        return $this->belongsTo(Carrito::class);
    }
}
