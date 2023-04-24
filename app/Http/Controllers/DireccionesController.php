<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Direcciones;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;

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
        $direcciones = Direcciones::where('usuario_id', '=', Session::get('loginId'))->get();

        return view('profile.addEditAddress', compact('direcciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
        if(isset($request->nombreDireccion)) {
            Direcciones::where('usuario_id', '=', Session::get('loginId'))->update([
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
            Direcciones::where('usuario_id', '=', Session::get('loginId'))->update([
                'nombreUser' => $request->nombreUser,
                'pais' => $request->pais,
                'estado' => $request->estado,
                'ciudad' => $request->ciudad,
                'colonia' => $request->colonia,
                'calle' => $request->calle,
                'cpostal' => $request->cpostal,
                'telefono' => $request->telefono,
                'usuario_id' => Session::get('loginId')]);
        }

        return redirect()->back()->with('info', 'Datos actualizados correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
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

        $direccion = Direcciones::find($request->id);

        if(isset($request->nombreDireccion)) {
            $direccion->nombreDireccion = $request->nombreDireccion;
            $direccion->nombreUser = $request->nombreUser;
            $direccion->pais = $request->pais;
            $direccion->estado = $request->estado;
            $direccion->ciudad = $request->ciudad;
            $direccion->colonia = $request->colonia;
            $direccion->calle = $request->calle;
            $direccion->cpostal = $request->cpostal;
            $direccion->telefono = $request->telefono;
            $direccion->usuario_id = Session::get('loginId');
        } else {
            $direccion->nombreUser = $request->nombreUser;
            $direccion->pais = $request->pais;
            $direccion->estado = $request->estado;
            $direccion->ciudad = $request->ciudad;
            $direccion->colonia = $request->colonia;
            $direccion->calle = $request->calle;
            $direccion->cpostal = $request->cpostal;
            $direccion->telefono = $request->telefono;
            $direccion->usuario_id = Session::get('loginId');
        }

        return redirect()->back()->with('info', 'Datos actualizados correctamente');
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
