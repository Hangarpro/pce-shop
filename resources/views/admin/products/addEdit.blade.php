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
                        @if (isset($producto))
                            <h1>Editar producto</h1>
                        @else
                            <h1>Agregar Producto</h1>
                        @endif
                        
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
                                <form id="myForm" method="POST" action="@if(isset($producto)) {{ route('admin.products.update', ['id'=>$producto->id]) }} @else {{ route('admin.products.add') }} @endif" enctype="multipart/form-data">        
                                    @csrf
                                    
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="hidden" value="@if(isset($producto)) {{$producto->id }} @endif" name="producto_id">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" value="@if(isset($producto)){{$producto->nombre}}@else{{old('nombre')}}  @endif" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Precio</label>
                                        <input type="number" step="any" value="@if(isset($producto)){{$producto->precio}}@else{{old('precio')}}@endif" name="precio" class="form-control"
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Existencia</label>
                                        <input type="number" name="existencia" value="@if(isset($producto)){{$producto->existencia}}@else{{old('existencia')}}@endif" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipo</label><br>
                                        <input type="radio" id="nuevo" name="tipo" value="nuevo"  required="required">
                                        <label for="nuevo">Nuevo</label>
                                        <br><input type="radio" id="exclusivo" name="tipo" value="exclusivo">
                                        <label for="exclusivo">Exclusivo</label>
                                        <br><input type="radio" id="limitado" name="tipo" value="limitado">
                                        <label for="limitado">Limitado</label><br>
                                        <input type="radio" id="regular" name="tipo" value="regular">
                                        <label for="regular">Regular</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Imagen</label>
                                        <input type="file" class="form-control-file" name="imagen" value="@if(isset($producto)){{$producto->imagen}}@else{{old('imagen')}}@endif" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Imagen secundaria</label>
                                        <input type="file" name="imagen2" class="form-control-file" value="@if(isset($producto)){{$producto->imagen2}}@else{{old('imagen2')}}@endif" required name="imagen" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Marca</label>
                                        <input type="text" name="marca" value="@if(isset($producto)){{$producto->marca}}@else{{old('marca')}}@endif" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea rows="5" class="form-control" name="descripcion" value="@if(isset($producto)){{$producto->descripcion}}@else{{old('descripcion')}}@endif" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button  name="guardar" class="btn btn-primary">Guardar</button>
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
