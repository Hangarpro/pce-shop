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
                        <h1>Ventas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Ventas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <label>Filtrar por fecha:</label>
            <form method="post">
                <div class="form-inline" style="margin-bottom: 5px">
                    <div class="form-group">
                        <input type="date" value="2017-05-24" name="fechaInicio" class="form-control"
                            style="margin-left: 5px; margin-right: 5px; width: 200px">
                    </div>
                    <label for=""> - </label>
                    <input type="date" value="2022-05-03" name="fechaFinal" class="form-control"
                        style="margin-left: 5px; margin-right: 5px; width: 200px">
                    <button type="submit" name="guardar" class="btn btn-primary">Filtrar</button>
                </div>
            </form>

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
                                            <th>Fecha</th>
                                            <th>Usuario</th>
                                            <th>Total de la venta</th>
                                            <th>Resumen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ventas as $venta)
                                            <tr>
                                                <td> {{$venta->id}} </td>
                                                <td> {{$venta->fecha}} </td>
                                                <td>{{$venta->nombre}} <br> {{$venta->correo}}</td>
                                                <td>${{$venta->ventaTotal}}</td>
                                                <td><a href="">Ver recibo</a></td>
                                            </tr>
                                        @endforeach
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
