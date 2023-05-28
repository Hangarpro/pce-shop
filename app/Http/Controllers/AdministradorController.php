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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session;

class AdministradorController extends Controller
{
    public function index()
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
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
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $productos = Producto::all();

                return view('admin.products.index', compact('productos'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function add_producto() {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                return view('admin.products.addEdit', compact('user'));
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
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
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
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $producto = Producto::find($id);

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
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
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

                    Producto::where('id', '=', $request->producto_id)->update([
                        'nombre' => $request->nombre,
                        'correo' => $request->precio,
                        'existencia' => $request->existencia,
                        'tipo' => $request->tipo,
                        'marca' => $request->marca,
                        'descripcion' => $request->descripcion,
                        'imagen' => $input['imagen'],
                        'imagen_secundaria' => $input['imagen_secundaria']
                    ]);
                } else {
                    Producto::where('id', '=', $request->producto_id)->update([
                        'nombre' => $request->nombre,
                        'correo' => $request->precio,
                        'existencia' => $request->existencia,
                        'tipo' => $request->tipo,
                        'marca' => $request->marca,
                        'descripcion' => $request->descripcion,
                        'imagen' => $input['imagen'],
                        'imagen_secundaria' => null
                    ]);
                }

                $productos = Producto::all();
                return redirect()->route('admin.products.index')->with('info', 'Producto actualizado correctamente');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function show_existencia() {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $productos = Producto::all();

                return view('admin.products.update', compact('productos'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function update_existencia(Request $request) {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $request->validate([
                    'id' => 'required',
                    'existencia' => 'required'
                ]);

                $existencia = $request->existencia;

                DB::table('productos')->where('id', $request->id)->increment('existencia', $existencia);

                return redirect()->back()->with('info', 'Existencias agregadas');
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
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $producto = Producto::find($id);
            if($producto)
                $producto->delete();

                return redirect()->back()->with('info', 'Producto eliminado correctamente');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function usuarios()
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $usuarios = Usuario::all();

                return view('admin.users.index', compact('usuarios'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function add_usuario() {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                return view('admin.users.addEdit');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function store_usuario(Request $request)
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $request->validate([
                    'nombre' => 'required',
                    'correo' => 'required',
                    'password' => 'required|confirmed'
                ]);
        
                $usuario = Usuario::create([
                    'nombre' => $request->nombre,
                    'correo' => $request->correo,
                    'rol' => 'Usuario',
                    'contrasena' => Hash::make($request->password)
                ]);
        
                return redirect()->route('admin.users.index');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    function show_usuario($id) {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $usuario = Usuario::find($id);

                return view('admin.users.addEdit', compact('usuario'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function update_usuario(Request $request)
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $request->validate([
                    'usuario_id => required',
                    'nombre' => 'required_without:correo',
                    'correo' => 'required_without:nombre'
                ]);

                if(isset($request->nombre)) {
                    Usuario::where('id', '=', $request->usuario_id)->update([
                        'nombre' => $request->nombre
                    ]);
                }
                if(isset($request->correo)) {
                    Usuario::where('id', '=', $request->usuario_id)->update([
                        'correo' => $request->correo
                    ]);
                }

                if(Session::get('loginId') === $request->usuario_id) {
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
                }

                $usuarios = Usuario::all();
                return view('admin.users.index', compact('usuarios'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function show_update($id)
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $usuario = Usuario::find($id);

                return view('admin.users.changePassword', compact('usuario'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function update_contrasena(Request $request)
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $request->validate([ 
                    'usuario_id' => 'required',
                    'contrasena' => 'required',
                    'password' => 'required|confirmed',
                ]);
        
                $usuarioContrasena = Usuario::find($request->usuario_id);
                $hashContrasena = $usuarioContrasena->contrasena;

                if (\Hash::check($request->contrasena, $hashContrasena)) {
                    if (!\Hash::check($request->password, $hashContrasena)) {
                        
                        Usuario::where('id', $request->usuario_id)->update([
                            'contrasena' => \Hash::make($request->password)
                        ]);

                        $usuarios = Usuario::all();
                        return redirect()->route('admin.users.index', compact('usuarios'))->with('info', 'Contraseña cambiada con éxito');
                    } else {
                        return redirect()->back()->with('info', 'La nueva contraseña no puede ser la anterior');
                    } 
                } else {
                    return redirect()->back()->with('info', 'Contraseña incorrecta');
                }
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function destroy_usuario($id)
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            //$user->rol == 'Administrador' || $user->rol == 'Sistema'
            if(true) {
                $usuario = Usuario::find($id);
                if($usuario)
                    $usuario->delete();

                return redirect()->back()->with('info', 'Usuario eliminado correctamente');
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }
}
