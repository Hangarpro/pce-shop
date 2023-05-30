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
                        <h1>Recibo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Ventas</a></li>
                            <li class="breadcrumb-item active">Pedido #{{$ventas[0]->id}}</li>
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
                        <div class="main-content mb-4">
                            <div class="page-content">
                                <div class="container-fluid">
                                    <div class="row justify-content-center">
                                        <div class="col-xxl-9">
                                            <div class="card" id="demo">
                                                <div class="row">
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="card-body p-4">
                                                            <div class="row g-3">
                                                                <div class="col-lg-3 col-6">
                                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">
                                                                        N.º de pedido</p>
                                                                    <h5 class="fs-14 mb-0">#{{$carrito->envio_numero}}</h5>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-3 col-6">
                                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">
                                                                        Fecha</p>
                                                                    <h5 class="fs-14 mb-0"><span id="invoice-date">{{$carrito->fecha_compra}}</span>></h5>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-3 col-6">
                                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">
                                                                        Estatus del envío</p>
                                                                    <span
                                                                        class="badge text-bg-success fs-12">{{$carrito->envio_estado}}</span>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-3 col-6">
                                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">
                                                                        Total</p>
                                                                    <h5 class="fs-14 mb-0">$<span
                                                                            id="total-amount">{{$carrito->total}}</span></h5>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                        <!--end card-body-->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="card-body p-4 border-top border-top-dashed">
                                                            <div class="row g-3">
                                                                <div class="col-6">
                                                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">
                                                                        Dirección de envío</h6>
                                                                    <p class="fw-medium mb-2">{{$direcciones->calle}}, {{$direcciones->colonia}}</p>
                                                                    <p class="text-muted mb-1">{{$direcciones->ciudad}}, {{$direcciones->estado}}</p>
                                                                    <p class="text-muted mb-1">CP: {{$direcciones->cpostal}}</p>
                                                                    <p class="text-muted mb-1"><span> {{$direcciones->pais}} </span></p>
                                                                    <p class="text-muted mb-0"><span>{{$direcciones->telefono}}</span></p>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-6">
                                                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">
                                                                        Datos de la paquetería</h6>
                                                                    <p class="fw-medium mb-2">DHL</p>
                                                                    <p class="text-muted mb-1">Envío {{$carrito->envio_tipo}}</p>
                                                                    <p class="text-muted mb-1">N.º de rastreo: #{{$carrito->envio_numero}}
                                                                    </p>
                                                                    <p class="text-muted mb-1"><span>Celular: 55 5345 7000
                                                                    </p>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                        <!--end card-body-->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="card-body p-4">
                                                            <div class="table-responsive">
                                                                <table
                                                                    class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                                    <thead>
                                                                        <tr class="table-active">
                                                                            <th scope="col" style="width: 50px;">#</th>
                                                                            <th scope="col">Producto</th>
                                                                            <th scope="col">Precio</th>
                                                                            <th scope="col">Cantidad</th>
                                                                            <th scope="col" class="text-end">Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="products-list">
                                                                        @foreach ($productos as $producto)
                                                                            <tr>
                                                                                <th scope="row"> {{$producto->id}} </th>
                                                                                <td class="text-start">
                                                                                    <span class="fw-medium">Funko Pop: {{$producto->marca}}</span>
                                                                                    <p class="text-muted mb-0">{{$producto->nombre}}</p>
                                                                                </td>
                                                                                <td>${{$producto->precio}}</td>
                                                                                <td>{{$producto->cantidad}}</td>
                                                                                <td class="text-end">${{$producto->monto}}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                                <!--end table-->
                                                            </div>
                                                            <div class="border-top border-top-dashed mt-2 float-right">
                                                                <table
                                                                    class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                                                    style="width:250px">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Sub Total</td>
                                                                            <td class="text-end">${{$subtotal}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Costo de envío</td>
                                                                            @switch($carrito->envio_tipo)
                                                                                @case("Regular")
                                                                                    <td class="text-end">$99.00</td>
                                                                                    @break
                                                                                @case("Premium")
                                                                                    <td class="text-end">$159.00</td>
                                                                                    @break
                                                                                @case("Gratis")
                                                                                <td class="text-end">Envio gratis</td>
                                                                                @break
                                                                                @default
                                                                                    
                                                                            @endswitch
                                                                        </tr>
                                                                        <tr class="border-top border-top-dashed fs-15">
                                                                            <th scope="row">Total</th>
                                                                            <th class="text-end">${{$carrito->total}}</th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--end table-->
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-6">
                                                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">
                                                                        Datos del usuario:</h6>
                                                                    <p class="text-muted mb-1">Nombre: <span
                                                                            class="fw-medium" id="card-holder-name">{{$usuario->nombre}}</span></p>
                                                                    <p class="text-muted">Correo electrónico: <span class="fw-medium" id="">{{$usuario->correo}}</span></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">
                                                                        Detalles de pago:</h6>
                                                                    <p class="text-muted mb-1">Nombre en la tarjeta: 
                                                                        <span class="fw-medium" id="card-holder-name">{{$carrito->nombre_tarjeta}}</span>
                                                                    </p>
                                                                    <p class="text-muted mb-1">Número de la tarjeta: 
                                                                        <span class="fw-medium" id="card-number"> {{$carrito->numero_tarjeta}}</span>
                                                                    </p>
                                                                    <p class="text-muted">Cargo total: <span class="fw-medium"
                                                                            id="">$ {{$carrito->total}}
                                                                        </span></p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <!--end card-body-->
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end card-->
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                </div><!-- container-fluid -->
                            </div><!-- End Page-content -->
                        </div>
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
