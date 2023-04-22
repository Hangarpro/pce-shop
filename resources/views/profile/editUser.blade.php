@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Editar perfil
@endsection

@section('section')
    <div class="mt-4 mb-4 d-flex justify-content-center align-items-center">
        <div class="col-md-4 p-5 shadow-sm border rounded-3">
            <h2 class="text-center mb-4 text-primary">Editar Perfil</h2>
            <form method="POST" action="{{ route('editarUser') }}" >
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Nombre</label>
                    <input type="text" required value="{{old('nombre')}}" name="nombre" class="form-control border border-primary" id="inputName"> 
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Correo electrónico</label>
                    <input type="email" required value="{{old('correo')}}" name="correo" class="form-control border border-primary" id="inputEmail"> 
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" >Editar</button>
                </div>
            </form>
        </div>
    </div>
@endsection