<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
            //Regresar los 4 productos mas nuevos
            if($cantidad >= 4) {
                $productos = Producto::where('tipo', '=', 'Nuevo')->take(4)->get();
            } else {
                //No existen 4 productos nuevos, pero si de la misma marca
                if(Producto::where('marca', '=', $productos[0]->marca)->exists()) {
                    //Si se completan 4 productos con productos de la misma marca
                    if((Producto::where('marca', '=', $productos[0]->marca)->count() + $cantidad) >= 4) {
                        $productosMarca = Producto::where('marca', '=', $productos[0]->marca)->take(4 - $cantidad)->get();
                        $productos = $productos->merge($productosMarca);
                    } else {
                        //No se completan 4 productos de la misma marca
                        $productosMarca = Producto::where('marca', '=', $productos[0]->marca)->get();
                        $productos = $productos->merge($productosMarca);
                        $cantidad = $productos->count();
                        $productosMarca = Producto::where('marca', '!=', $productos[0]->marca)->take(4 - $cantidad)->get();
                        $productos = $productos->merge($productosMarca);
                    }
                } else {
                    //No existen productos de la misma marca
                    $productosMarca = Producto::where('marca', '!=', $productos[0]->marca)->take(4 - $cantidad)->get();
                    $productos = $productos->merge($productosMarca);
                }
            }
        }
        //No existen productos nuevos, se toman por marca
        else if(Producto::first()->exists()) {
            $productos = Producto::first()->get();
            if(Producto::where('marca', '=', $productos[0]->marca)->exists()) {
                //Si se completan 4 productos de marca
                if((Producto::where('marca', '=', $productos[0]->marca)->count() + $cantidad) >= 4) {
                    $productosMarca = Producto::where('marca', '=', $productos[0]->marca)->take(4 - $cantidad)->get();
                    $productos = $productos->merge($productosMarca);
                //No se completan 4 productos de marca
                } else {
                    $productosMarca = Producto::where('marca', '=', $productos[0]->marca)->get();
                    $productos = $productos->merge($productosMarca);
                    $cantidad = $productos->count();
                    $productosMarca = Producto::where('marca', '!=', $productos[0]->marca)->take(4 - $cantidad)->get();
                    $productos = $productos->merge($productosMarca);
                }
            //No existen productos nuevos, ni de marca
            } else {
                $productosMarca = Producto::where('marca', '!=', $productos[0]->marca)->take(4 - $cantidad)->get();
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

        return view('productos.details', compact('producto'));
    }
}
