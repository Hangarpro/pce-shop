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
use Illuminate\View\View;
use Session;

class AdministradorController extends Controller
{
    public function index()
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                /*$compras = (Carrito::where('compra_estado', '=', 1)->exists()) ? Carrito::where('compra_estado', '=', 1) : null;
                $usuarios = Usuario::all();
                $clientes = Carrito::groupBy('usuario_id')->where('compra_estado', '=', 1)->count();*/

                //compact('usuario', 'compras', 'usuarios', 'clientes')

                return view('admin.statistics.index');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function productos()
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                $productos = Producto::all();

                return view('admin.products.index', compact('productos', 'usuario'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function add_producto() {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                return view('admin.products.addEdit', compact('usuario'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function store_producto(Request $request)
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                $request->validate([
                    'nombre' => 'required',
                    'precio' => 'required',
                    'existencia' => 'required',
                    'tipo' => 'required',
                    'marca' => 'required',
                    'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'imagen2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'descripcion' => 'required'
                ]);

                $input = $request->all();

                $imagen = $request->file('imagen');
                $destino = 'images/';
                $nombreImagen = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
                $imagen->move($destino, $nombreImagen);
                $input['imagen'] = 'images/' . "$nombreImagen";

                if ($imagen2 = $request->file('imagen2')) {
                    $nombreImagen = date('YmdHis') . "." . $imagen2->getClientOriginalExtension();
                    $imagen2->move($destino, $nombreImagen);
                    $input['imagen_secundaria'] = 'images/' . "$nombreImagen";
                }
                Producto::create($input);

                $productos = Producto::all();
                return view('admin.products.index', compact('productos'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function show_producto($id) {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                $producto = Producto::find($id);

                return view('admin.products.addEdit', compact('producto', 'usuario'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function update_producto(Request $request)
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                $request->validate([
                    'nombre' => 'required',
                    'precio' => 'required',
                    'existencia' => 'required',
                    'tipo' => 'required',
                    'marca' => 'required',
                    'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'imagen2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'descripcion' => 'required'
                ]);

                $input = $request->all();

                $imagen = $request->file('imagen');
                $destino = 'images/';
                $nombreImagen = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
                $imagen->move($destino, $nombreImagen);
                $input['imagen'] = 'images/' . "$nombreImagen";

                if ($imagen2 = $request->file('imagen2')) {
                    $nombreImagen = date('YmdHis') . "." . $imagen2->getClientOriginalExtension();
                    $imagen2->move($destino, $nombreImagen);
                    $input['imagen_secundaria'] = 'images/' . "$nombreImagen";
                } else {
                    unset($input['imagen_secundaria']);
                }

                Producto::where('id', '=', $request->producto_id)->update([$input]);

                $productos = Producto::all();
                return redirect()->route('admin.products.index')->with('info', 'Producto actualizado correctamente');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function show_existencia(Request $request) {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                $producto = Producto::find($request->id);

                return view('admin.products.update', compact('producto', 'usuario'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function update_existencia(Request $request) {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                $request->validate([
                    'existencia' => 'required'
                ]);

                Producto::where('id', '=', $request->id)->update([
                    'existencia' => $request->existencia
                ]);

                return redirect()->route('admin.products.index')->with('info', 'Datos actualizados correctamente');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function destroy_producto($id)
    {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                $producto = Producto::find($id);
            if($producto)
                $producto->delete();

                return redirect()->back()->with('info', 'Prodcuto eliminado correctamente');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }
}
