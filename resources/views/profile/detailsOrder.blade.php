@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Pedido [No. de orden]
@endsection

@section('section')
    <div class="main-content mb-4">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                            <p class=""><a href="{{ url('/profile') }}" class="text-body text-decoration-none"><i
                                class="fas fa-long-arrow-alt-left me-2"></i>Regresar a mis compras</a></p>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Historial de compras</li>
                                        <li class="breadcrumb-item active">Pedido #702-5785766-3794299</li>
                                    </ol>
                                </div>    
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="card" id="demo">
                            <div class="row">
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <div class="row g-3">
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">N.º de pedido</p>
                                                <h5 class="fs-14 mb-0">#702-5785766-3794299</h5>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">Fecha</p>
                                                <h5 class="fs-14 mb-0"><span id="invoice-date">07 Abr, 2023</span> <small
                                                        class="text-muted" id="invoice-time">12:21PM</small></h5>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">Estatus del envío</p>
                                                <span class="badge text-bg-success fs-12">Entregado</span>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">Total</p>
                                                <h5 class="fs-14 mb-0">$<span id="total-amount">737.00</span></h5>
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
                                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Dirección de envío</h6>
                                                <p class="fw-medium mb-2">Tujefe #66, Chametla</p>
                                                <p class="text-muted mb-1">La Paz, Baja California Sur 28490</p>
                                                <p class="text-muted mb-1"><span>México</span></p>
                                                <p class="text-muted mb-0"><span>612 107 2052</span></p>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6">
                                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Datos de la paquetería</h6>
                                                <p class="fw-medium mb-2">DHL</p>
                                                <p class="text-muted mb-1">Envío Express (2-3 días)</p>
                                                <p class="text-muted mb-1">N.º de rastreo: #445809362</p>
                                                <p class="text-muted mb-1"><span>Celular: 55 5345 7000</p>
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
                                                    <tr>
                                                        <th scope="row">01</th>
                                                        <td class="text-start">
                                                            <span class="fw-medium">Funko Pop: Football</span>
                                                            <p class="text-muted mb-0">PSG - Lionel Messi
                                                            </p>
                                                        </td>
                                                        <td>$289.00</td>
                                                        <td>01</td>
                                                        <td class="text-end">$289.00</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">02</th>
                                                        <td class="text-start">
                                                            <span class="fw-medium">Funko Pop: Football</span>
                                                            <p class="text-muted mb-0">PSG - Lionel Messi
                                                            </p>
                                                        </td>
                                                        <td>$289.00</td>
                                                        <td>01</td>
                                                        <td class="text-end">$289.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <div class="border-top border-top-dashed mt-2">
                                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                                style="width:250px">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total</td>
                                                        <td class="text-end">$578.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Costo de envío</td>
                                                        <td class="text-end">$159.00</td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">Total</th>
                                                        <th class="text-end">$737.00</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <div class="mt-3">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Detalles de pago:</h6>
                                            <p class="text-muted mb-1">Nombre en la tarjeta: <span class="fw-medium"
                                                    id="card-holder-name">Josh Nichols</span></p>
                                            <p class="text-muted mb-1">Número de la tarjeta: <span class="fw-medium"
                                                    id="card-number">xxx xxxx xxxx 1234</span></p>
                                            <p class="text-muted">Cargo total: <span class="fw-medium" id="">$ 737.00
                                                </span></p>
                                        </div>
                                        <div class="mt-4">
                                            <div class="alert alert-info">
                                                <p class="mb-0"><span class="fw-semibold">NOTA:</span>
                                                    <span>Protegemos y salvaguardamos sus datos personales para evitar el daño, pérdida, 
                                                        destrucción, robo, extravío, alteración, así como el tratamiento no autorizado 
                                                        de sus datos personales.
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                            <a href="javascript:window.print()" class="btn btn-primary"><i class="fa-solid fa-print me-1" 
                                                style="color: #ffffff;"></i></i> Imprimir</a>
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
@endsection
