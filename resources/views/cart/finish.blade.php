@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Gracias por tu compra
@endsection

@section('style')
    <link href="{!! asset('css/cart.css') !!}" rel="stylesheet">
@endsection

@section('section')
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between">
                                        <p>07 de abril de 2023</p>
                                        <p>Pedido n.º 702-5785766-3794299</p>
                                    </div>

                                    <p class="h5 mb-4">Gracias por tu compra. <br> Tu número de rastreo es: #445809362</p>

                                    <p class="h4 mb-4">Resumen de tu compra:</p>


                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-between">
                                                <div class="d-flex align-items-center col-12 col-md-6">
                                                    <div class="col-4 col-md-4">
                                                        <img src={!! asset('images/psg-messi-cover.webp') !!}
                                                            class="img-fluid rounded-3" alt="Shopping item"
                                                            style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3 col-7 col-md-8">
                                                        <h5>Football</h5>
                                                        <p class="small">PSG - Lionel Messi</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center col-12 mb-3 col-md-5">
                                                    <div class="col-4 col-md-3 me-2">
                                                        <h5 class="fw-normal">1</h5>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <h5 class="">$289.00</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-between">
                                                <div class="d-flex align-items-center col-12 col-md-6">
                                                    <div class="col-4 col-md-4">
                                                        <img src={!! asset('images/psg-messi-cover.webp') !!}
                                                            class="img-fluid rounded-3" alt="Shopping item"
                                                            style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3 col-7 col-md-8">
                                                        <h5>Football</h5>
                                                        <p class="small">PSG - Lionel Messi</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center col-12 mb-3 col-md-5">
                                                    <div class="col-4 col-md-3 me-2">
                                                        <h5 class="fw-normal">1</h5>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <h5 class="">$289.00</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-between">
                                                <div class="d-flex align-items-center col-12 col-md-6">
                                                    <div class="col-4 col-md-4">
                                                        <img src={!! asset('images/psg-messi-cover.webp') !!}
                                                            class="img-fluid rounded-3" alt="Shopping item"
                                                            style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3 col-7 col-md-8">
                                                        <h5>Football</h5>
                                                        <p class="small">PSG - Lionel Messi</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center col-12 mb-3 col-md-5">
                                                    <div class="col-4 col-md-3 me-2">
                                                        <h5 class="fw-normal">1</h5>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <h5 class="">$289.00</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-between">
                                                <div class="d-flex align-items-center col-12 col-md-9">
                                                    <div class="ms-3 col-6 col-md-6">
                                                        <p class="small">Subtotal</p>
                                                        <h5 class="mt-0">$927.00</h5>
                                                    </div>
                                                    <div class="ms-3 col-5 col-md-6">
                                                        <p class="small">Envío</p>
                                                        <h5 class="mt-0">$99.00</h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row col-12 mb-3 col-md-3 mx-auto">
                                                    <div class="ms-3 col-12 col-md-12">
                                                        <p class="small">Total</p>
                                                        <h5 class="mt-0">$1,027.00</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <a type="button" href="{{url('/')}}" class="btn btn-primary" style="margin-top: 0%">
                                            Volver a la tienda
                                        </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection