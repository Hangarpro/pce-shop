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
                        <h1>Añadir unidades</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Productos</li>
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
                                <form action="{{ route('admin.products.addExistencia', ['id'=>$producto->id]) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Producto</label><br>
                                        {{-- <select class="form-control">
                                            <option class="text-muted"> {{$producto->nombre}} </option>
                                            <option class="text-muted">Batman - El señor de la noche</option>
                                        </select> --}}
                                        <label>{{$producto->nombre}}</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Cantidad a añadir</label>
                                        <input type="number" name="existencia" class="form-control" value="{{$producto->existencia}}" required="required">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
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