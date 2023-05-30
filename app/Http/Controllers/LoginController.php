<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        if(Session::has('loginId')) {
            return redirect()->route('productos.index');
        } else {
            return view('login.index');
        }        
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
                Session::put('loginId', $usuario->id);
                Session::put('nombreUsr', $usuario->nombre);

                if(isset($usuario->rol)) {
                    switch ($usuario->rol) {
                        case 'Usuario': 
                            return redirect()->route('productos.index'); break;

                        case 'Administrador': 
                            return redirect()->route('admin.statistics.index'); break;

                        case 'Sistema': 
                            return redirect()->route('admin.statistics.index'); break;

                        default: 
                            return redirect()->back()->with('info', 'Error en el inicio de sesión'); break;
                    }
                } else {
                    return redirect()->back()->with('info', 'Error en el inicio de sesión');
                }
            } else {
                return redirect()->back()->with('info', 'Contraseña incorrecta');
            }
        } else {
            return redirect()->back()->with('info', 'Error en el inicio de sesión');
        }
    }

    function logout(Request $request) {
        $request->session()->flush();

        return redirect()->route('login.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'password' => 'required|confirmed'
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'rol' => 'Usuario',
            'contrasena' => Hash::make($request->password)
        ]);

        $usuario = Usuario::where('correo', '=', $request->correo)->first();
        Session::put('loginId', $usuario->id);
        Session::put('nombreUsr', $usuario->nombre);

        return redirect()->route('productos.index');
    }

    public function register()
    {
        if(Session::has('loginId')) {
            return redirect()->route('productos.index');
        } else {
            return view('registro.index');
        }
    }
}
