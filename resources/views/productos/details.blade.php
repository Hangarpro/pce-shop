@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | [Nombre del producto]
@endsection

@section('section')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src={!! asset('images/psg-messi-cover.webp') !!} alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1"> {{$producto[0]->marca}} </div>
                <h1 class="display-5 fw-bolder">PSG - Lionel Messi</h1>
                <div class="fs-5 mb-5">
                    <span>$259.00</span>
                </div>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                <div class="d-flex row">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <button class="btn btn-primary flex-shrink-0 col-8" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Añadir al carrito
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Productos relacionados</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Exclusivo</div>
                    <!-- Product image-->
                    <img class="card-img-top" src={!! asset('images/psg-messi-cover.webp') !!} widheight="300px" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">PSG - Lionel Messi</h5>
                            <!-- Product price-->
                            $259.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn p-3 btn-outline-dark mt-auto" href="#">Ver Producto</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Nuevo</div>
                    <!-- Product image-->
                    <img class="card-img-top" src={!! asset('images/psg-messi-cover.webp') !!} widheight="300px" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">PSG - Lionel Messi</h5>
                            <!-- Product price-->
                            $259.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn p-3 btn-outline-dark mt-auto" href="#">Ver Producto</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Regular</div>
                    <!-- Product image-->
                    <img class="card-img-top" src={!! asset('images/psg-messi-cover.webp') !!} widheight="300px" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">PSG - Lionel Messi</h5>
                            <!-- Product price-->
                            $259.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn p-3 btn-outline-dark mt-auto" href="#">Ver Producto</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Glow in the dark</div>
                    <!-- Product image-->
                    <img class="card-img-top" src={!! asset('images/psg-messi-cover.webp') !!} widheight="300px" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">PSG - Lionel Messi</h5>
                            <!-- Product price-->
                            $259.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn p-3 btn-outline-dark mt-auto" href="#">Ver Producto</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection