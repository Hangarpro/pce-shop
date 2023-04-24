<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Direcciones;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
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
            'nombreUser' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'colonia' => 'required',
            'calle' => 'required',
            'cpostal' => 'required',
            'telefono' => 'required'
        ]);

        if(isset($request->nombreDireccion)) {
            $direccion = Direcciones::create([
                'nombreDireccion' => $request->nombreDireccion,
                'nombreUser' => $request->nombreUser,
                'pais' => $request->pais,
                'estado' => $request->estado,
                'ciudad' => $request->ciudad,
                'colonia' => $request->colonia,
                'calle' => $request->calle,
                'cpostal' => $request->cpostal,
                'telefono'-> $request->telefono,
                'usuario_id' => Session::get('loginId')]);
        } else {
            $direccion = Direcciones::create([
                'nombreUser' => $request->nombreUser,
                'pais' => $request->pais,
                'estado' => $request->estado,
                'ciudad' => $request->ciudad,
                'colonia' => $request->colonia,
                'calle' => $request->calle,
                'cpostal' => $request->cpostal,
                'telefono'-> $request->telefono,
                'usuario_id' => Session::get('loginId')]);
        }

        return redirect()->back()->with('info', 'Direccion registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $direccion = Direcciones::where('usuario_id', '=', Session::get('loginId'))->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Direcciones $direcciones): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'calle' => 'required',
            'cpostal' => 'required'
        ]);

        $direccion = Direcciones::where('id', $request->id)->fisrt();
        $direccion->calle = $request->calle;
        $direccion->cpostal = $request->cpostal;
        $direccion->referencias = $request->referencias;
        $direccion->usuario_id = $request->usuario_id;
        $direccion->save();

        return redirect()->back()->with('info', 'Direccion actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $direccion = Direcciones::find($id);
        if($direccion)
            $direccion->delete();
        return redirect()->back()->with('info', 'Direccion eliminada');
    }
}
