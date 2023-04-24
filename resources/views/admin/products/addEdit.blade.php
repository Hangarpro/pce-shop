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
                        <h1>Agregar Producto</h1>
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
                                <form class="#" method="post">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Precio</label>
                                        <input type="number" step="any" name="precio" class="form-control"
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Existencia</label>
                                        <input type="number" name="existencia" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipo</label><br>
                                        <input type="radio" id="nuevo" name="tipoProducto" value="nuevo"
                                            required="required">
                                        <label for="nuevo">Nuevo</label>
                                        <br><input type="radio" id="exclusivo" name="tipoProducto" value="exclusivo">
                                        <label for="exclusivo">Exclusivo</label>
                                        <br><input type="radio" id="limitado" name="tipoProducto" value="limitado">
                                        <label for="limitado">Limitado</label><br>
                                        <input type="radio" id="regular" name="tipoProducto" value="regular">
                                        <label for="regular">Regular</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Imagen</label>
                                        <input type="text" name="imagen" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Imagen Secundaria</label>
                                        <input type="text" name="img_secundaria" class="form-control"
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Marca</label>
                                        <input type="text" name="marca" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input type="text" name="descripcion" class="form-control" required="required">
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
