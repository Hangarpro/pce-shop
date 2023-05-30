@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Editar perfil
@endsection

@section('section')
    <div class="mt-4 mb-4 d-flex justify-content-center align-items-center">
        <div class="col-md-4 p-5 shadow-sm border rounded-3">
            <h2 class="text-center mb-4 text-primary">Editar Perfil</h2>
            <form method="POST" action="{{ route('profile.show') }}" >
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Nombre</label>
                    <input type="text" required pattern="[a-zA-Z\s]+" title="Por favor ingrese solo letras" name="nombre" value="{{$usuario->nombre}}" class="form-control border border-primary" id="inputName"> 
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Correo electrónico</label>
                    <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Por favor, introduce una dirección de correo electrónico válida en el formato usuario@dominio.com" required name="correo" value="{{$usuario->correo}}" class="form-control border border-primary" id="inputEmail"> 
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" >Editar</button>
                </div>
            </form>
        </div>
    </div>
@endsection