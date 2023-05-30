@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Pago
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
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="{{ url('/cart') }}" class="text-body text-decoration-none"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Regresar a la tienda</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-0">Tienes {{$carrito->compra->count()}} productos en tu carrito</p>
                                        </div>
                                    </div>

                                    @foreach ($productos as $producto)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row d-flex justify-content-between">
                                                    <div class="d-flex align-items-center col-12 col-md-6">
                                                        <div class="col-4 col-md-4">
                                                            <img src="{{$producto->imagen}}" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3 col-7 col-md-8">
                                                            <h5>{{$producto->marca}}</h5>
                                                            <p class="small">{{$producto->nombre}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center col-12 mb-3 col-md-5">
                                                        <div class="col-4 col-md-3 me-2">
                                                            <h5 class="fw-normal">1</h5>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <h5 class="">${{$producto->precio}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    

                                </div>
                                <div class="col-lg-5">
                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Datos de la tarjeta</h5>
                                            </div>
                                            <hr class="my-4">
                                            <form class="mt-4" action="{{route('carrito.store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="direccion_id" value="{{$direccion->id}} ">
                                                <input type="hidden" name="carrito_id" value="{{$carrito->id}} ">
                                                <label class="form-label" for="typeName">Nombre en la tarjeta</label>
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="typeName"
                                                        class="form-control form-control-lg" size="17"
                                                        placeholder="Nombre en la tarjeta" required/>
                                                </div>

                                                <label class="form-label" for="typeText">Número de tarjeta</label>
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" name="tarjeta" class="form-control form-control-lg" size="17" placeholder="1234 5678 9012 3457" size="18" id="cr_no" minlength="19" maxlength="19" required/>
                                                </div>

                                                <div class="row d-flex ps-0">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="typeExp">Expiración</label>
                                                        <div class="form-outline form-white">
                                                            <input type="text"
                                                                class="form-control form-control-lg" placeholder="MM/YY"
                                                                size="7" id="exp" minlength="5"
                                                                maxlength="5" required/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="typeCVV">CVV</label>
                                                        <div class="form-outline form-white">
                                                            <input type="password" id="typeCVV"
                                                                class="form-control form-control-lg"
                                                                placeholder="&#9679;&#9679;&#9679;" size="1"
                                                                minlength="3" maxlength="3" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Subtotal</p>
                                                    <p class="mb-2">${{$subtotal}}</p>
                                                </div>
    
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Envío</p>
                                                    <p class="mb-2">{{$envio_tipo}}</p>
                                                    <input type="hidden" name="envio_tipo" value="{{$envio_tipo}}">
                                                </div>
    
                                                <div class="d-flex justify-content-between mb-4">
                                                    <p class="mb-2">Total (Imp. Incluidos)</p>
                                                    <p class="mb-2">${{$total}}</p>
                                                    <input type="hidden" name="total" value="{{$total}}">
                                                </div>

                                                {{-- <a type="button" class="btn btn-primary btn-block btn-lg">
                                                    <div class="d-flex justify-content-center">
                                                        <span>Pagar <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                    </div>
                                                </a> --}}
                                                <button class="btn btn-primary">PAGAR</button>
                                            </form>

             

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
    //For Card Number formatted input
    var cardNum = document.getElementById('cr_no');
    cardNum.onkeyup = function (e) {
    if (this.value == this.lastValue) return;
    var caretPosition = this.selectionStart;
    var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
    var parts = [];
    for (var i = 0, len = sanitizedValue.length; i < len; i +=4) { parts.push(sanitizedValue.substring(i, i + 4)); } for (var i=caretPosition - 1; i>= 0; i--) {
    var c = this.value[i];
    if (c < '0' || c> '9') {
    caretPosition--;
    }
    }
    caretPosition += Math.floor(caretPosition / 4);
    this.value = this.lastValue = parts.join(' ');
    this.selectionStart = this.selectionEnd = caretPosition;
    }
    //For Date formatted input
    var expDate = document.getElementById('exp');
    expDate.onkeyup = function (e) {
    if (this.value == this.lastValue) return;
    var caretPosition = this.selectionStart;
    var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
    var parts = [];
    for (var i = 0, len = sanitizedValue.length; i < len; i +=2) { parts.push(sanitizedValue.substring(i, i + 2)); } for (var i=caretPosition - 1; i>= 0; i--) {
    var c = this.value[i];
    if (c < '0' || c> '9') {
    caretPosition--;
    }
    }
    caretPosition += Math.floor(caretPosition / 2);
    this.value = this.lastValue = parts.join('/');
    this.selectionStart = this.selectionEnd = caretPosition;
    }
    });
    </script>
@endsection