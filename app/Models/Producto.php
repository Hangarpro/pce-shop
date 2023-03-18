<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'precio',
        'existencia',
        'tipo',
        'imagen',
        'imagen_secundaria',
        'marca',
        'descripcion'
    ]; 
    public function carrito_productos(){
        return $this->hasMany(Carrito_Productos::class);
    }
}
