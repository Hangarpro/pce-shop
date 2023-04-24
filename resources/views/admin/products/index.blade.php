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
                        <h1>Productos
                            <a href="{{url('/productsAdd')}}"><i class="fa fa-plus" aria-hidden="true"
                                    title="Agregar Producto"></i></a>
                        </h1>
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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Existencias<a href="{{url('/productsUpdate')}}"><i class="fa fa-plus"
                                                aria-hidden="true" title="Agregar Unidades"></i></a></th>
                                            <th>Tipo</th>
                                            <th>Marca</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>PSG - Lionel Messi</td>
                                            <td>$289.00</td>
                                            <td>28</td>
                                            <td>Nuevo</td>
                                            <td>Football</td>
                                            <td style="text-align: center">
                                                <a href="{{url('/productsAdd')}}"
                                                    style="margin-right: 5px;" title="Editar Producto">
                                                    <i class="fas fa-edit"></i> </a>
                                                <a href="#"
                                                    class="text-danger borrar" title="Eliminar Producto" name="borrar2">
                                                    <i class="fas fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
