<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Session;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('productos.index', [
            'productos' => DB::table('productos')->paginate(12)
        ], compact('productos'));
    }

    public function welcome()
    {
        //Existen productos nuevos
        if(Producto::where('tipo', '=', 'Nuevo')->exists()) {
            $cantidad = Producto::where('tipo', '=', 'Nuevo')->count();
            //Regresar los 3 productos mas nuevos
            if($cantidad >= 3) {
                $productos = Producto::where('tipo', '=', 'Nuevo')->take(3)->get();
            } else {
                //No existen 3 productos nuevos, pero si de la misma marca
                if(Producto::where('marca', '=', $productos[0]->marca)->exists()) {
                    //Si se completan 3 productos con productos de la misma marca
                    if((Producto::where('marca', '=', $productos[0]->marca)->count() + $cantidad) >= 3) {
                        $productosMarca = Producto::where('marca', '=', $productos[0]->marca)->take(3 - $cantidad)->get();
                        $productos = $productos->merge($productosMarca);
                    } else {
                        //No se completan 3 productos de la misma marca
                        $productosMarca = Producto::where('marca', '=', $productos[0]->marca)->get();
                        $productos = $productos->merge($productosMarca);
                        $cantidad = $productos->count();
                        $productosMarca = Producto::where('marca', '!=', $productos[0]->marca)->take(3 - $cantidad)->get();
                        $productos = $productos->merge($productosMarca);
                    }
                } else {
                    //No existen productos de la misma marca
                    $productosMarca = Producto::where('marca', '!=', $productos[0]->marca)->take(3 - $cantidad)->get();
                    $productos = $productos->merge($productosMarca);
                }
            }
        }
        //No existen productos nuevos, se toman por marca
        else if(Producto::first()->exists()) {
            $productos = Producto::first()->get();
            if(Producto::where('marca', '=', $productos[0]->marca)->exists()) {
                //Si se completan 3 productos de marca
                if((Producto::where('marca', '=', $productos[0]->marca)->count() + $cantidad) >= 3) {
                    $productosMarca = Producto::where('marca', '=', $productos[0]->marca)->take(3 - $cantidad)->get();
                    $productos = $productos->merge($productosMarca);
                //No se completan 3 productos de marca
                } else {
                    $productosMarca = Producto::where('marca', '=', $productos[0]->marca)->get();
                    $productos = $productos->merge($productosMarca);
                    $cantidad = $productos->count();
                    $productosMarca = Producto::where('marca', '!=', $productos[0]->marca)->take(3 - $cantidad)->get();
                    $productos = $productos->merge($productosMarca);
                }
            //No existen productos nuevos, ni de marca
            } else {
                $productosMarca = Producto::where('marca', '!=', $productos[0]->marca)->take(3 - $cantidad)->get();
                $productos = $productos->merge($productosMarca);
            }
        }
        
        return view('welcome', compact('productos'));
    }

    public function about()
    {
        return view('about.index');
    }

    public function show($id)
    {
        $producto = Producto::where('id', $id)->get();
        $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

        return view('productos.details', compact('producto', 'usuario'));
    }
}
