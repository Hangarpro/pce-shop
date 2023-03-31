@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Log In
@endsection

@section('section')
    <div class="mt-4 mb-4 d-flex justify-content-center align-items-center">
        <div class="col-md-4 p-5 shadow-sm border rounded-3">
            <h2 class="text-center mb-4 text-primary">Editar cuenta</h2>
            <form>
                <div class="mb-3">
                    <label for="inputName" class="form-label">Nombre</label>
                    <input type="text" class="form-control border border-primary" id="inputName">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control border border-primary" id="inputEmail">
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Editar perfil</button>
                </div>
            </form>
        </div>
    </div>
@endsection