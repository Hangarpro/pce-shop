@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | [Nombre del producto]
@endsection

@section('section')
<section class="py-2">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6 thumbnail">
                <img class="card-img-top mb-5 mb-md-0 principalImg" src={!! asset($producto[0]->imagen) !!} alt="..." />
                <img class="card-img-top mb-5 mb-md-0 secondaryImg" src={!! asset($producto[0]->imagen_secundaria) !!} alt="..." />
            </div>
            <div class="col-md-6">
                <div class="small mb-1 badge rounded-pill {{ getBrandColor($producto[0]->marca) }}"> {{$producto[0]->marca}} </div>
                <h1 class="display-5 fw-bolder">{{$producto[0]->nombre}}</h1>
                <div class="fs-5 mb-2">
                    <span>${{$producto[0]->precio}}</span>
                </div>
                <p class="lead" style="text-align: justify">{{$producto[0]->descripcion}}</p>

                @if(session()->has('loginId'))      
                    <div class="d-flex row">
                        <form method="POST" action="{{ route('productos.store', ['id'=>$producto[0]->id]) }}" style="display: flex">
                            @csrf 
                            <input class="form-control text-center me-3" name="cantidad" id="inputQuantity" type="number" value="1" style="max-width: 5rem" min="1" max="{{$producto[0]->existencia}}" />
                            <input type="hidden" name="producto_id" value="{{$producto[0]->id}}">
                            <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
                            <button class="btn btn-primary col-8">
                                <i class="fa-solid fa-cart-shopping"></i>
                                Añadir al carrito
                            </button>
                        </form>
                    </div>
                @endif
                
    
                {{--  --}}
            </div>
        </div>
    </div>
</section>

{{-- <section class="py-5 bg-light">
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
</section> --}}
@endsection
@section('scripts')
    <script>
        var inputQuantity = document.getElementById("inputQuantity");

        inputQuantity.addEventListener("keydown", function(e) {
        e.preventDefault();
        });
    </script>
@endsection