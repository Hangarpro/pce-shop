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
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class AdministradorController extends Controller
{
    public function index()
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $usuarios = Usuario::all()->count();
                \DB::statement("SET SQL_MODE=''");

                $clientes = Carrito::where('compra_estado', 1)->groupBy('usuario_id')->count();
                $ventas_hoy = Carrito::where('compra_estado', 1)->whereDate('fecha_compra', Carbon::today())->count();
                $ventas_sem = Carrito::where('compra_estado', 1)->whereBetween('fecha_compra', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                $ventas_gra = Carrito::whereBetween('fecha_compra', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->where('compra_estado', 1)
                    ->groupBy('fecha_compra')
                    ->orderBy('fecha_compra', 'DESC')
                    ->get(array(DB::raw('Date(fecha_compra) as "dia"'), DB::raw('SUM(total) as "ventas"')));
                
                $productos = Compra::select( DB::raw('productos.nombre, compra.cantidad'))
                    ->join('productos', 'productos.id', '=', 'compra.producto_id')
                    ->join('carrito', 'carrito.id', '=', 'compra.carrito_id')
                    ->where('carrito.compra_estado', '=', 1)
                    ->select('nombre', DB::raw('count(*) as cantidad'))
                    ->groupBy('productos.nombre')
                    ->take(6)->get();

                $fechas_ventas = $ventas_gra->pluck('dia');
                $monto_ventas = $ventas_gra->pluck('ventas');
                $nombre_productos = $productos->pluck('nombre');
                $cantidad_productos = $productos->pluck('cantidad');
                //return $nombre_p;
                return view('admin.statistics.index', compact('usuarios', 'clientes', 'ventas_hoy', 'ventas_sem', 'fechas_ventas', 'monto_ventas', 'nombre_productos', 'cantidad_productos', 'user'));
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $productos = Producto::all();

                return view('admin.products.index', compact('productos', 'user'));
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
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
                return view('admin.products.index', compact('productos', 'user'));
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $producto = Producto::find($id);

                return view('admin.products.addEdit', compact('producto', 'user'));
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $productos = Producto::all();

                return view('admin.products.update', compact('productos', 'user'));
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $usuarios = Usuario::all();

                return view('admin.users.index', compact('usuarios', 'user'));
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $request->validate([
                    'nombre' => 'required',
                    'correo' => 'required',
                    'password' => 'required|confirmed'
                ]);
        
                $usuario = Usuario::create([
                    'nombre' => $request->nombre,
                    'correo' => $request->correo,
                    'rol' => 'Administrador',
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $usuario = Usuario::find($id);

                return view('admin.users.addEdit', compact('usuario', 'user'));
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
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
                return view('admin.users.index', compact('usuarios', 'user'));
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $usuario = Usuario::find($id);

                return view('admin.users.changePassword', compact('usuario', 'user'));
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
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
                        return redirect()->route('admin.users.index', compact('usuarios', 'user'))->with('info', 'Contraseña cambiada con éxito');
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

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
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

    public function ventas()
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $ventas = Venta::select( DB::raw('ventas.*, usuarios.nombre, usuarios.correo'))
                    ->join('usuarios', 'usuarios.id', '=', 'ventas.usuario_id')->get();

                return view('admin.sales.index', compact('ventas', 'user'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function show_venta($id)
    {
        if(Session::has('loginId')) {
            $user = Usuario::find(Session::get('loginId'));

            if($user->rol === 'Administrador' || $user->rol === 'Sistema') {
                $carrito = Carrito::find($id);
                $direcciones = Direcciones::find($carrito->direccion_id);
                $usuario = Usuario::find($carrito->usuario_id);
                $ventas = Venta::where('carrito_id', $carrito->id)->get();

                $envio_tipo = $carrito->envio_tipo;
                $total = $carrito->total;
                $subtotal = $total;
                switch($envio_tipo) {
                    case 'Regular': $subtotal -= 99; break;
                    case 'Premium': $subtotal -= 159; break;
                }

                $productos = Producto::select( DB::raw('productos.*, compra.*'))
                    ->join('compra', 'compra.producto_id', '=', 'productos.id')->where('compra.carrito_id', $id)->get();

                return view('admin.sales.receipt', compact('usuario', 'direcciones', 'ventas', 'productos', 'carrito', 'subtotal', 'user'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }
}
