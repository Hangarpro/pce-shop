@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Sign Up
@endsection

@section('section')
    <div class="mt-4 mb-4 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-3">
        <h2 class="text-center mb-4 text-primary">Crear cuenta</h2>
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="mb-3">
                <label for="inputName" class="form-label">Nombre</label>
                <input type="text" required autofocus class="form-control border border-primary " value="{{old('nombre')}}" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Correo electrónico</label>
                <input type="email" required class="form-control border border-primary" value="{{old('correo')}}" id="correo" name="correo">
            </div>

            {{-- 
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Contraseña</label>
                    <input type="password"required class="form-control border border-primary" id="contrasena" name="contrasena">
                </div>
                <div class="mb-3">
                    <label for="inputPassword2" class="form-label">Repite tu contraseña</label>
                    <input type="password" required class="form-control border border-primary" id="contrasena2" name="contrasena2">
                </div> 
            --}}

            <div class="mb-3">
                <label for="inputPassword" class="form-label">Contraseña</label>    
                    <input id="password" type="password" class="form-control border border-primary @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>Las contraseñas no coinciden</strong>
                        </span>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="col-md-12 col-form-label text-md-right">Confirmar contraseña</label>  
                <input id="password" type="password" class="form-control border border-primary @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
            </div>

            
            <div class="d-grid">
                <button class="btn btn-primary">Crear cuenta</button>
            </div>
        </form>
        <div class="mt-3">
            <p class="mb-0  text-center">¿Ya tienes una cuenta? <a href="{{ route('login.store') }}"
                    class="text-primary fw-bold">Inicia sesión aquí</a></p>
        </div>
    </div>
    </div>
@endsection
