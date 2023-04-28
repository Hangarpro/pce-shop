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
                        <h1>Usuarios</h1>
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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Acciones
                                                <a href="{{url('/usersAdd')}}"><i class="fa fa-plus"
                                                        aria-hidden="true" title="Agregar Usuario"></i></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Jesús Carlos</td>
                                            <td>prueba_admin@prueba.com</td>
                                            <td style="text-align: center">
                                                <a href="{{url('/usersAdd')}}"
                                                    style="margin-right: 5px;" title="Editar Usuario">
                                                    <i class="fas fa-edit"></i> </a>
                                                    <a href="{{url('/usersPass')}}"
                                                    style="margin-right: 5px;"  class="text-warning" title="Editar Usuario">
                                                    <i class="fas fa-key"></i> </a>
                                                <a href="#"
                                                    class="text-danger borrar" title="Eliminar Usuario">
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
