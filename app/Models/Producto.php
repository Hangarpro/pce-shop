<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $nullable = [
        'descripcion',
        'imagen',
        'imagen_secundaria'
    ];
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
    public function compra(){
        return $this->hasMany(Compra::class, 'compra_id', 'id');
    }
}
