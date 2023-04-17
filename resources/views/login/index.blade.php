@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Log In
@endsection

@section('section')
<div class="mt-4 mb-4 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-primary">Iniciar sesión</h2>
        <form method="POST" action="{{'/login'}}">
            @csrf
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control border border-primary" id="inputEmail" name="correo">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control border border-primary" id="inputPassword" name="contrasena">
            </div>
            {{--<p class="small"><a class="text-primary" href="forget-password.html">Forgot password?</a></p>--}}
            <div class="d-grid">
                <button class="btn btn-primary" >Iniciar Sesión</button>
            </div>
        </form>
        <div class="mt-3">
            <p class="mb-0  text-center">¿No tienes una cuenta? <a href="{{url('/register')}}"
                    class="text-primary fw-bold">Regístrate</a></p>
        </div>
    </div>
</div>
@endsection
