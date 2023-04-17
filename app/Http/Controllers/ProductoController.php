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
        ]);
    }

    public function show($id)
    {
        $producto = Producto::where('id', $id);

        return $producto;
    }
}
