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
        $productos = Producto::where('tipo', '=', 'Nuevo')->take(4)->get();

        return view('welcome', compact('productos'));
    }

    public function show($id)
    {
        $producto = Producto::find($id)->get();

        return view('productos.details', compact('producto'));
    }
}
