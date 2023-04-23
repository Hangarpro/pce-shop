<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuario = array();
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
        }

        return view('login.index', compact('usuario'));
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
                Session::put('loginId', $usuario->id);
                Session::put('nombreUsr', $usuario->nombre);
                return redirect('/productos');
            } else {
                return redirect()->back()->with('info', 'Contraseña incorrecta');
            }
        } else {
            return redirect()->back()->with('info', 'Error en el inicio de sesión');
        }
    }

    function logout(Request $request) {
        $request->session()->flush();

        return redirect('/login');
    }

    function profile() {
        $usuario = array();
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
        }

        return view('profile.index', compact('usuario'));
    }

    function editProfile() {
        $usuario = array();
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
        }

        return view('profile.editUser', compact('usuario'));
    }

    function loginShow() {
        $usuario = array();
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
        }

        return view('login.index', compact('usuario'));
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
        $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
        if(isset($request->nombre)) {
            Usuario::where('id', '=', Session::get('loginId'))->update([
                'nombre' => $request->nombre
            ]);
            Session(['nombreUsr'=> $usuario->nombre]);
        }
        if(isset($request->correo)) {
            Usuario::where('id', '=', Session::get('loginId'))->update([
                'correo' => $request->correo
            ]);
            Session(['nombreUsr'=> $usuario->correo]);
        }

        //$usuario->contrasena => Hash::make($request->contrasena)

        return redirect()->back()->with('info', 'Datos actualizados correctamente');
    }

    public function updateContrasena(Request $request)
    {
        $request->validate([ 
            'id' => 'required',
            'contrasena' => 'required',
            'password' => 'required|confirmed',
        ]);
 
        $usuarioContrasena = Usuario::where('id', '=', Session::get('loginId'))->first();
        $hashContrasena = $usuarioContrasena->contrasena;

        if (\Hash::check($request->contrasena, $hashContrasena)) {
            if (!\Hash::check($request->password, $hashContrasena)) {
                
                Usuario::where('id', '=', Session::get('loginId'))->update([
                    'contrasena' => \Hash::make($request->password)
                ]);

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
