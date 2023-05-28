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
                            <a href="{{route('admin.products.new')}}"><i class="fa fa-plus" aria-hidden="true"
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
                                            <th>Existencias  &nbsp; &nbsp;<a href="{{ route('admin.products.existencia') }}"><i class="fa fa-plus" aria-hidden="true" title="Agregar Unidades"></i></a> </th>
                                            <th>Tipo</th>
                                            <th>Marca</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- admin.products.existencia --}}
                                        @foreach ($productos as $producto)
                                            <tr>
                                                <td> {{$producto->id}} </td>
                                                <td>{{$producto->nombre}} </td>
                                                <td>${{$producto->precio}} </td>
                                                <td>{{$producto->existencia}} </td>
                                                <td>{{$producto->tipo}} </td>
                                                <td>{{$producto->marca}}</td>
                                                <td style="text-align: center">
                                                    <a href="{{ route('admin.products.show', ['id'=>$producto->id]) }}" style="margin-right: 5px;" title="Editar Producto">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="text-danger borrar" title="Eliminar Producto" name="borrar2" onclick="showDeleteConfirmation({{$producto->id}});" > 
                                                        <i class="fas fa-trash"></i> 
                                                    </a>
                                                        <form id="deleteForm{{$producto->id}}" action="{{ route('admin.products.destroy', ['id' => $producto->id]) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" style="display: none;"></button>
                                                        </form>

                                                    {{-- <a href="#" class="fa-solid fa-trash text-decoration-none text-danger" onclick="showDeleteConfirmation({{$direccion->id}});" style="cursor: pointer; padding: 0; background-color: transparent; border: none; margin-left: -1rem;"></a> --}}

                                                </td>
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
@section('scripts')

<script>
    function showDeleteConfirmation(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción eliminará el producto permanentemente.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + id).submit();
            }
        });
    }
</script>
@endsection