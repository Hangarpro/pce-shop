<?php

namespace App\Http\Controllers;

use App\Models\Carrito_Productos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Carrito_ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Carrito_Productos $carrito_Productos): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrito_Productos $carrito_Productos): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrito_Productos $carrito_Productos): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrito_Productos $carrito_Productos): RedirectResponse
    {
        //
    }
}
