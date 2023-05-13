<?php

namespace App\Http\Controllers;

use App\Models\Contactanos;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;

class ContactanosController extends Controller
{
    public function index()
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            return view('contact.index', compact('usuario'));
        } else {
            return view('contact.index');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required',
            'comentario' => 'required'
        ]);

        Contactanos::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'comentario' => $request->comentario,
        ]);

        return redirect()->route('welcome')->with('info', 'Se ha guardado su comentario');
    }
}
