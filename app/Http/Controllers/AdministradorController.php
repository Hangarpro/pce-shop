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

            if($usuario->rol == 'Administrador' || $usuario->rol == 'Sistema') {
                $compras = (Carrito::where('compra_estado', '=', 1)->exists()) ? Carrito::where('compra_estado', '=', 1) : null;
                $usuarios = Usuario::all();
                $clientes = Carrito::groupBy('usuario_id')->where('compra_estado', '=', 1)->count();

                return view('admin.statistics.index', compact('usuario', 'compras', 'usuarios', 'clientes'));
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('login.index');
        } 
    }

    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Administrador $administrador): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrador $administrador): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrador $administrador): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $administrador): RedirectResponse
    {
        //
    }
}
