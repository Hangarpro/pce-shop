<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Direcciones;
use App\Models\Usuario;
use App\Models\Carrito;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class UsuarioController extends Controller
{
    function profile() {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
            $direcciones = Direcciones::where('usuario_id', '=', Session::get('loginId'))->get();
            $ventas = Venta::where('usuario_id', $usuario->id)->get();

            return view('profile.index', compact('usuario', 'direcciones', 'ventas'));
        } else {
            return redirect()->route('login.index');
        } 
    }

    function profileOrder($id) {
        if(Session::has('loginId')) {
            $usuario = Usuario::find(Session::get('loginId'));
            $carrito = Carrito::find($id);

            if($carrito->usuario_id === $usuario->id) {
                $direcciones = Direcciones::find($carrito->direccion_id);
                $ventas = Venta::where('carrito_id', $carrito->id)->get();

                $envio_tipo = $carrito->envio_tipo;
                $total = $carrito->total;
                $subtotal = $total;
                switch($envio_tipo) {
                    case 'Regular': $subtotal -= 99; break;
                    case 'Premium': $subtotal -= 159; break;
                }

                $productos = Producto::select( DB::raw('productos.*, compra.*'))
                    ->join('compra', 'compra.producto_id', '=', 'productos.id')->where('compra.carrito_id',$carrito->id)->get();

                return view('profile.detailsOrder', compact('usuario', 'direcciones', 'ventas', 'productos', 'carrito', 'subtotal'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        } 
    }

    function profileAddress() {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
            $direcciones = Direcciones::where('usuario_id', '=', Session::get('loginId'))->get();

            return view('profile.addEditAddress', compact('usuario', 'direcciones'));
        } else {
            return redirect()->route('login.index');
        }   
    }

    function editProfile() {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            return view('profile.editUser', compact('usuario'));
        } else {
            return redirect()->route('login.index');
        }   
    }

    public function updateUsuario(Request $request)
    {
        if(Session::has('loginId')) {
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

            return redirect()->route('profile.index')->with('info', 'Datos actualizados correctamente');
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function updateContrasena(Request $request)
    {
        if(Session::has('loginId')) {
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

                    return redirect()->route('profile.index')->with('info', 'Contraseña cambiada con éxito');
                } else {
                    return redirect()->back()->with('info', 'La nueva contraseña no puede ser la anterior');
                } 
            } else {
                return redirect()->back()->with('info', 'Contraseña incorrecta');
            }
        } else {
            return redirect()->route('login.index');
        } 
    }
    
    public function destroy(Usuario $usuario): RedirectResponse
    {
        //
    }
}
