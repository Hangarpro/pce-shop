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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            return view('contact.index', compact('usuario'));
        } else {
            return view('contact.index');
        }

        
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
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required',
            'comentario' => 'required'
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'comentario' => $request->comentario,
        ]);

        return redirect()->route('welcome')->with('info', 'Se ha guardado su comentario');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contactanos $contactanos): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contactanos $contactanos): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contactanos $contactanos): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contactanos $contactanos): RedirectResponse
    {
        //
    }
}
