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
    public function store(Request $request)
    {
        if(Session::has('loginId')) {
            $request->validate([
                'nombreUser' => 'required',
                'pais' => 'required',
                'estado' => 'required',
                'ciudad' => 'required',
                'colonia' => 'required',
                'calle' => 'required',
                'cpostal' => 'required',
                'telefono' => 'required',
                'userId' => 'required'
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
                    'telefono'=> $request->telefono,
                    'usuario_id' => $request->userId]);
            } else {
                $direccion = Direcciones::create([
                    'nombreUser' => $request->nombreUser,
                    'pais' => $request->pais,
                    'estado' => $request->estado,
                    'ciudad' => $request->ciudad,
                    'colonia' => $request->colonia,
                    'calle' => $request->calle,
                    'cpostal' => $request->cpostal,
                    'telefono'=> $request->telefono,
                    'usuario_id' => $request->userId]);
            }

            return redirect()->route('profile.index')->with('info', 'Direccion registrada correctamente');
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function show($id)
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
            $direcciones = Direcciones::where('usuario_id', '=', Session::get('loginId'))->first();

            return view('profile.addEditAddress', compact('usuario', 'direcciones'));
        } else {
            return redirect()->route('login.index');
        }   
    }

    public function showDireccion(Request $request)
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
            $direccion = Direcciones::find($request->id);

            return view('profile.addEditAddress', compact('usuario', 'direccion'));
        } else {
            return redirect()->route('login.index');
        }
    }

    public function edit(Request $request)
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
            if(isset($request->nombreDireccion)) {
                Direcciones::where('id', '=', $request->id)->update([
                    'nombreDireccion' => $request->nombreDireccion,
                    'nombreUser' => $request->nombreUser,
                    'pais' => $request->pais,
                    'estado' => $request->estado,
                    'ciudad' => $request->ciudad,
                    'colonia' => $request->colonia,
                    'calle' => $request->calle,
                    'cpostal' => $request->cpostal,
                    'telefono' => $request->telefono,
                    'usuario_id' => Session::get('loginId')]);
            } else {
                Direcciones::where('id', '=', $request->id)->update([
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

            return redirect()->route('profile.index')->with('info', 'Direccion actualizada correctamente');
        } else {
            return redirect()->route('login.index');
        }
    }

    public function update(Request $request): RedirectResponse
    {
        if(Session::has('loginId')) {
            $request->validate([
                'nombreUser' => 'required',
                'pais' => 'required',
                'estado' => 'required',
                'ciudad' => 'required',
                'colonia' => 'required',
                'calle' => 'required',
                'cpostal' => 'required',
                'telefono' => 'required',
                'userId' => 'required',
                'direccId' => 'required'
            ]);
    
            $direccion = Direcciones::find($request->direccId);
    
            if(isset($request->nombreDireccion)) {
                Direcciones::where('id', '=', $request->direccId)->update([
                    'nombreDireccion' => $request->nombreDireccion,
                    'nombreUser' => $request->nombreUser,
                    'pais' => $request->pais,
                    'estado' => $request->estado,
                    'ciudad' => $request->ciudad,
                    'colonia' => $request->colonia,
                    'calle' => $request->calle,
                    'cpostal' => $request->cpostal,
                    'telefono'=> $request->telefono,
                    'usuario_id' => $request->userId]);
            } else {
                Direcciones::where('id', '=', $request->direccId)->update([
                    'nombreUser' => $request->nombreUser,
                    'pais' => $request->pais,
                    'estado' => $request->estado,
                    'ciudad' => $request->ciudad,
                    'colonia' => $request->colonia,
                    'calle' => $request->calle,
                    'cpostal' => $request->cpostal,
                    'telefono' => $request->telefono,
                    'usuario_id' => $request->userId]);
            }
    
            return redirect()->route('profile.index')->with('info', 'Direccion actualizada correctamente');
        } else {
            return redirect()->route('login.index');
        }
    }

    public function destroy($id)
    {
        if(Session::has('loginId')) {
            $direccion = Direcciones::find($id);
            if($direccion)
                $direccion->delete();

            return redirect()->back()->with('info', 'Direccion eliminada');
        } else {
            return redirect()->route('login.index');
        }
    }
}
