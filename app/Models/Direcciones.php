<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'pais',
        'estado',
        'ciudad',
        'colonia',
        'calle',
        'cpostal',
        'referencias'
    ]; 
    public function usuario_id(){
        return $this->belongsTo(Usuario::class);
    }
}
