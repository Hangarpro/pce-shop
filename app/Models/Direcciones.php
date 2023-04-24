<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreDireccion',
        'nombreUser',
        'pais',
        'estado',
        'ciudad',
        'colonia',
        'calle',
        'cpostal',
        'telefono',
        'usuario_id'
    ]; 
    
    public function usuario_id(){
        return $this->belongsTo(Usuario::class);
    }
}
