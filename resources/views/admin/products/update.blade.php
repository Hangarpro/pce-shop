@extends('admin.layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Dashboard
@endsection

@section('section')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div>
                    @if(session('info'))
                        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert" id="myAlert">
                            <i class="mdi mdi-check-all me-2">{{session('info')}}</i>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    </div>
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
                                <form action="{{ route('admin.products.addExistencia') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Producto</label><br>
                                        <select name="id" class="form-control">
                                            @foreach ($productos as $producto)
                                                <option value="{{ $producto->id }}" name="id" class="text-muted" @if(old('id') == $producto->id) selected @endif>
                                                    {{ $producto->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Cantidad a añadir</label>
                                        <input type="number" name="existencia" class="form-control" required="required">
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
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var closeButton = document.querySelector('.btn-close');
            var alert = document.querySelector('#myAlert');

            closeButton.addEventListener('click', function() {
                alert.style.display = 'none';
                alert.classList.remove('show');
            });
        });
    </script>
@endsection
