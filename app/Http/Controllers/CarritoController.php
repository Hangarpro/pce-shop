<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Compra;
use App\Models\Direcciones;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Session;

class CarritoController extends Controller
{
    public function obtenerMonto($id, $cantidad) 
    {
        $producto = Producto::find($id);
        $monto = (($producto->precio) * $cantidad);

        return $monto;
    }

    public function index()
    {
        if(Session::has('loginId')) {
            $carrito = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->first();
            $compra = Compra::where('carrito_id', '=', $carrito->id);
            $productos = Productos::find($compra->producto_id);

            return view('cart.index', compact('compra', 'productos'));
        } else {
            return redirect()->route('login.index');
        }  
    }

    public function show()
    {
        if(Session::has('loginId')) {
            $carrito = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->first();
            $compra = Compra::where('carrito_id', '=', $carrito->id);
            $productos = Productos::find($compra->producto_id);

            return view('cart.payment', compact('compra', 'productos'));
        } else {
            return redirect()->route('login.index');
        }   
    }

    /*

    public function pagado($productos, $compra)
    {
        if(Session::has('loginId')) {
            $carrito = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->first();
            $compra = Compra::where('carrito_id', '=', $carrito->id);
            $productos = Productos::find($compra->producto_id);

            return view('cart.finish', compact('compra', 'productos'));
        } else {
            return redirect()->route('login.index');
        }   
    }*/

    public function anadir(Request $request)
    {
        if(Session::has('loginId')) {
            $request->validate([
                'usuario_id' => 'required',
                'producto_id' => 'required',
                'cantidad' => 'required'
            ]);

            if(Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->exists()) {
                $carrito = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->get();

                $compra = Compra::create([
                    'producto_id' => $request->producto_id,
                    'carrito_id' => $carrito->id,
                    'cantidad' => $request->cantidad,
                    'monto' => obtenerMonto($request->producto_id, $request->cantidad) ]);
            } else {
                $carrito = Carrito::create([
                    'compra_estado' => 0,
                    'usuario_id' => $request->usuario_id,
                    'compra_id' => $compra->id]);

                $compra = Compra::create([
                    'producto_id' => $request->producto_id,
                    'carrito_id' => $carrito->id,
                    'cantidad' => $request->cantidad,
                    'monto' => obtenerMonto($request->producto_id, $request->cantidad) ]);
            }
        } else {
            return redirect()->route('login.index');
        }   
    }

    public function comprar()
    {
        $request->validate([
            'direccion_id' => 'required',
            'tarjeta' => 'required',
            'envio_tipo' => 'required'
        ]);

        if(Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->exists()) {
            $carrito = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->first();
            $numero = Str::random(3) + '-' + Str::random(7) + '-' + Str::random(7);
            $total = Compra::where('carrito_id', '=', $carrito->id)->sum('monto');
            $hoy = Carbon::now();

            Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->update([
                'direccion_id' => $request->direccion_id,
                'tarjeta' => $request->tarjeta,
                'compra_estado' => 1,
                'envio_tipo' => $request->envio_tipo,
                'envio_estado' => 'Pendiente',
                'envio_numero' => $numero,
                'fecha_compra' => $hoy,
                'total' => $total]);
        }
    }

    public function historial()
    {
        if(Session::has('loginId')) {
            $fechaA = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('fecha_compra', Carrito::min('fecha_compra'))->orderBy('fecha_compra','desc')->get();
            $fechaB = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('fecha_compra', Carrito::max('fecha_compra'))->orderBy('fecha_compra','desc')->get();

            $carrito = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 1)->first();
            $compra = Compra::where('carrito_id', '=', $carrito->id);
            $productos = Productos::find($compra->producto_id);
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
            $direcciones = Direcciones::where('usuario_id', '=', Session::get('loginId'))->first();

            return view('profile.index', compact('carrito', 'compra', 'productos', 'usuario', 'direcciones', 'fechaA', 'fechaB'))->withInput(['tab'=>'productos']);
        } else {
            return redirect()->route('login.index');
        }  
    }

    public function remover($id)
    {
        if(Session::has('loginId')) {
            $compra = Compra::find($id);
            if($compra)
                $compra->delete();

            return redirect()->back()->with('info', 'Compra eliminada');
        } else {
            return redirect()->route('login.index');
        }
    }
}
