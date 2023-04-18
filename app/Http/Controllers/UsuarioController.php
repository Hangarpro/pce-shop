<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $usuario = Usuario::where('id', Auth::user()->id)->with('direcciones')->get();
        
        return $usuario;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'password' => 'required|confirmed'
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->password)
            //'contrasena' => $request->password
        ]);

        return redirect('/productos');
    }

    function login(Request $request)
    {
        $this->validate($request, [
            'correo' => 'required',
            'contrasena' => 'required'
        ]);

        $usuario = Usuario::where('correo', '=', $request->correo)->first();
        if($usuario) {
            if(Hash::check($request->contrasena, $usuario->contrasena)) {
                return redirect('/productos');
            } else {
                return redirect()->back()->with('info', 'Contraseña incorrecta');
            }
        } else {
            return redirect()->back()->with('info', 'Error en el inicio de sesión');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario): Response
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUsuario(Request $request)
    {
        $usuario = Usuario::find(Auth::user()->id);
        if(isset($request->nombre))
            $usuario->nombre = $request->nombre;
        if(isset($request->correo))
            $usuario->correo = $request->correo;
        //$usuario->contrasena => Hash::make($request->contrasena)
        $usuario->save();

        return redirect()->back()->with('info', 'Datos actualizados correctamente');
    }

    public function updateContrasena(Request $request, $id)
    {
        $request->validate([ 
            'contrasena' => 'required',
            'contrasena_nueva' => 'required',
        ]);
 
        $hashContrasena = Auth::user()->contrasena;
        if (\Hash::check($request->contrasena , $hashContrasena)) {
            if (\Hash::check($request->contrasena_nueva , $hashContrasena)) {
 
                $usuario = Usuario::find(Auth::user()->id);
                $usuario->contrasena = Hash::make($request->contrasena_nueva);
                $users->save();
                return redirect()->back()->with('info', 'Contraseña cambiada con éxito');
            } else {
                return redirect()->back()->with('info', 'La nueva contraseña no puede ser la anterior');
            } 
        } else {
            return redirect()->back()->with('info', 'Contraseña incorrecta');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario): RedirectResponse
    {
        //
    }
}
