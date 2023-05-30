<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new Usuario([
            'nombre' => 'Administrador',
            'correo' => 'admin@mail.mx',
            'rol' => 'Administrador',
            'contrasena' => Hash::make('pass')
        ]);
        $usuario->save(); 
    }
}
