<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Compra;
use App\Models\Direcciones;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Venta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();
            if(Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->exists()) {
                $carrito = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->get();
                $total = $carrito[0]->compra->sum('monto');
                $productos = Producto::join("compra", "compra.producto_id", "=", "productos.id")->select("*")->get();
                $direcciones = array();

                if(Direcciones::where('usuario_id', '=', Session::get('loginId'))->exists())
                    $direcciones = Direcciones::where('usuario_id', '=', Session::get('loginId'))->get();
                return view('cart.index', compact('carrito', 'productos', 'direcciones', 'total', 'usuario'));
            } else {
                $carrito = array();
                $total = array();
                $productos = array();
                $direcciones = array();

                if(Direcciones::where('usuario_id', '=', Session::get('loginId'))->exists())
                    $direcciones = Direcciones::where('usuario_id', '=', Session::get('loginId'))->get();
                return view('cart.index', compact('carrito', 'productos', 'direcciones', 'total', 'usuario'));
            }
        } else {
            return redirect()->route('login.index');
        }  
    }

    public function anadir(Request $request)
    {
        if(Session::has('loginId')) {
            $request->validate([
                'usuario_id' => 'required',
                'producto_id' => 'required',
                'cantidad' => 'required'
            ]);

            if(Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->exists()) {
                $carrito = Carrito::where('usuario_id', '=', Session::get('loginId'))->where('compra_estado', '=', 0)->first();

                $compra = Compra::create([
                    'producto_id' => $request->producto_id,
                    'carrito_id' => $carrito->id,
                    'cantidad' => $request->cantidad,
                    'monto' => $this->obtenerMonto($request->producto_id, $request->cantidad) ]);
            } else {
                $carrito_id = Carrito::insertGetId([
                    'compra_estado' => 0,
                    'usuario_id' => $request->usuario_id]);

                $compra = Compra::create([
                    'producto_id' => $request->producto_id,
                    'carrito_id' => $carrito_id,
                    'cantidad' => $request->cantidad,
                    'monto' => $this->obtenerMonto($request->producto_id, $request->cantidad) ]);
            }
            return redirect()->back()->with('info', 'Producto agregado al carrito');
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

            return redirect()->back()->with('info', 'Producto eliminado del carrito');
        } else {
            return redirect()->route('login.index');
        }
    }

    public function enviar(Request $request)
    {
        if(Session::has('loginId')) {
            $request->validate([
                'direccion_id' => 'required',
                'envio_tipo' => 'required',
                'carrito_id' => 'required',
                'total' => 'required'
            ]);

            $contenido = $request->all;

            return $this->show($request);
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function show(Request $request)
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::find(Session::get('loginId'));

            $request->validate([
                'direccion_id' => 'required',
                'envio_tipo' => 'required',
                'carrito_id' => 'required',
                'total' => 'required'
            ]);

            if(Carrito::find($request->carrito_id)) {
                $carrito = Carrito::find($request->carrito_id);
                $total = $request->total;

                $productos = Producto::select( DB::raw('productos.id, compra.*'))
                ->join('compra', 'compra.producto_id', '=', 'productos.id')->where('compra.carrito_id',$carrito->id)->get();

                
                $direcciones = Direcciones::find($request->direccion_id);

                return view('cart.payment', compact('carrito', 'productos', 'direcciones', 'total', 'usuario'));
            } else {
                return redirect()->route('carrito.index');
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function comprar(Request $request)
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::find(Session::get('loginId'));

            $request->validate([
                'direccion_id' => 'required',
                'tarjeta' => 'required',
                'envio_tipo' => 'required',
                'carrito_id' => 'required',
                'total' => 'required'
            ]);
    
            if(Carrito::find($request->carrito_id)) {
                $numero = Str::random(3) + '-' + Str::random(7) + '-' + Str::random(7);
                $hoy = Carbon::now();
    
                Carrito::where('id', '=', $request->carrito_id)->update([
                    'direccion_id' => $request->direccion_id,
                    'tarjeta' => $request->tarjeta,
                    'compra_estado' => 1,
                    'envio_tipo' => $request->envio_tipo,
                    'envio_estado' => 'Pendiente',
                    'envio_numero' => $numero,
                    'fecha_compra' => $hoy,
                    'total' => $request->total]);
                
                Venta::create([
                    'fecha' => $hoy,
                    'usuario_id' => $usuario->id,
                    'ventaTotal' => $request->total,
                    'carrito_id' => $request->carrito_id
                ]);
                return view('cart.finish');
            }

            
        } else {
            return redirect()->route('login.index');
        }
    }

    public function historial($min, $max)
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', Session::get('loginId'))->first();
            $carritos = Carrito::where('compra_estado', 1)->where('usuario_id', $usuario->id)->whereBetween('fecha_compra', [$min, $max])->get();
            $compras = Compra::findMany($carritos->id);
            $productos = DB::table('productos')
            ->join('compra', function ($join) {
                $join->on('productos.id', '=', 'compra.producto_id')
                     ->where('compra.carrito_id', '=', $carritos->id);
            })->get();

            $direcciones = array();
                if(Direcciones::where('usuario_id', $usuario->id))
                    $direcciones = Direcciones::where('usuario_id', $usuario->id)->get();

            return view('profile.index', compact('carritos', 'compras', 'productos', 'direcciones', 'usuario'))->withInput(['tab'=>'productos']);
        } else {
            return redirect()->route('login.index');
        }  
    }
}
