@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Log In
@endsection

@section('section')
<div class="mt-4 mb-4 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-primary">Crear cuenta</h2>
        <form>
            <div class="mb-3">
                <label for="inputName" class="form-label">Nombre</label>
                <input type="text" class="form-control border border-primary" id="inputName">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control border border-primary" id="inputEmail">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control border border-primary" id="inputPassword">
            </div>
            <div class="mb-3">
                <label for="inputPassword2" class="form-label">Repite tu contraseña</label>
                <input type="password" class="form-control border border-primary" id="inputPassword2">
            </div>
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Crear cuenta</button>
            </div>
        </form>
        <div class="mt-3">
            <p class="mb-0  text-center">¿Ya tiene una cuenta? <a href="{{url('/login')}}"
                    class="text-primary fw-bold">Inicia sesión aquí</a></p>
        </div>
    </div>
</div>
@endsection
