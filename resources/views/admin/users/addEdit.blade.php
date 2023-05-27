@extends('admin.layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Dashboard
@endsection

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if (isset($user))
                            <h1>Editar usuario</h1>{{$user->correo}}
                        @else
                            <h1>Agregar usuario</h1>{{$user->correo}}
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Usuarios</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- <form class="#" method="post"> --}}
                                <form id="myForm" method="POST" action="@if(isset($usuario)) {{ route('admin.users.update', ['id'=>$usuario->id]) }} @else {{ route('admin.users.add') }} @endif" enctype="multipart/form-data">        
                                    @csrf
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" value="@if(isset($usuario)){{$usuario->nombre}}@else{{old('nombre')}}  @endif" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="email" name="correo" value="@if(isset($usuario)){{$usuario->correo}}@else{{old('correo')}}  @endif" class="form-control" required="required">
                                    </div>
                                    {{-- 
                                        <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="pass" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirmar Contraseña</label>
                                            <input type="password" name="pass" class="form-control" required="required">
                                        </div> 
                                    --}}
                                    <div class="form-group">
                                        <label for="inputPassword" class="form-label">Contraseña</label>    
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">        @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Las contraseñas no coinciden</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password" >Confirmar contraseña</label>  
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                                    </div>
                                    <div class="form-group">
                                        <button name="guardar" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
