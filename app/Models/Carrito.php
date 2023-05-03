<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = "carrito";

    protected $nullable = [
        'direccion_id',
        'tarjeta',
        'envio_tipo',
        'envio_estado',
        'envio_numero',
        'fecha_compra',
        'fecha_entrega',
        'total'
    ];

    protected $fillable = [
        'usuario_id',
        'direccion_id',
        'tarjeta',
        'compra_id',
        'compra_estado',
        'envio_tipo',
        'envio_estado',
        'envio_numero',
        'fecha_compra',
        'fecha_entrega',
        'total'
    ]; 

    protected $hidden = [
        'tarjeta'
    ];

    public function usuario_id(){
        return $this->belongsTo(Usuario::class);
    }

    public function direccion_id(){
        return $this->belongsTo(Direcciones::class);
    }

    public function compra(){
        return $this->hasMany(Compra::class);
    }
}
