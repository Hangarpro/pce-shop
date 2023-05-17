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
                //$productos = Producto::all();

                //compact('productos')

                return view('admin.products.index');
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
                return view('admin.products.addEdit');
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

                $producto = Producto::create([
                    'nombre' => $request->nombre,
                    'correo' => $request->precio,
                    'existencia' => $request->existencia,
                    'tipo' => $request->tipo,
                    'marca' => $request->marca,
                    'descripcion' => $request->descripcion,
                ]);

                $imageName = time() . '.' . $request->imagen->extension(); 
                $request->imagen->move(public_path('images/'), $imageName);
                $producto->imagen = $imageName;
                $producto->save();

                if($request->has('imagen2')){
                    $imageName = time() . '.' . $request->imagen2->extension(); 
                    $request->imagen2->move(public_path('images/'), $imageName);
                    $producto->imagen2 = $imageName;
                    $producto->save();
                }
                return view('admin.products.index');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function show_producto(Request $request) {
        if(Session::has('loginId')) {
            $usuario = Usuario::where('id', '=', Session::get('loginId'))->first();

            //$usuario->rol == 'Administrador' || $usuario->rol == 'Sistema'
            if(true) {
                $producto = Producto::find($request->id);

                return view('admin.products.addEdit', compact('producto'));
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

                $producto = Porducto::find($request->producto_id);

                Producto::where('id', '=', $request->prodcuto_id)->update([
                    'nombre' => $request->nombre,
                    'correo' => $request->precio,
                    'existencia' => $request->existencia,
                    'tipo' => $request->tipo,
                    'marca' => $request->marca,
                    'descripcion' => $request->descripcion,
                ]);

                $imagen_old = public_path('images/').$producto->imagen;
                unlink($imagen_old);

                if($producto->imagen2 != ''  && $producto->imagen2 != null){
                    $imagen2_old = public_path('images/').$producto->imagen2;
                    unlink($imagen2_old);
               }

                $imageName = time() . '.' . $request->imagen->extension(); 
                $request->imagen->move(public_path('images/'), $imageName);
                $producto->imagen = $imageName;
                $producto->save();

                if($request->has('imagen2')){
                    $imageName = time() . '.' . $request->imagen2->extension(); 
                    $request->imagen2->move(public_path('images/'), $imageName);
                    $producto->imagen2 = $imageName;
                    $producto->save();
                }
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

                return view('admin.products.update', compact('producto'));
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

                return redirect()->back()->with('info', 'Prodcuto eliminado');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }
}
