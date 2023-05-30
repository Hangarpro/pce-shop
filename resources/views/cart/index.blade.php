@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Carrito
@endsection

@section('style')
    <link href="{!! asset('css/cart.css') !!}" rel="stylesheet">
@endsection

@section('section')
<div class="card mt-4 mb-4">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>Carrito</b></h4></div>
                    {{-- <div class="col align-self-center text-right text-muted">{{ isset($carrito[0]) ?? $carrito[0]->compra->count() + 'Productos' : 'No hay poductos' }}</div> --}}
                    <div class="col align-self-center text-right text-muted">{{ isset($carrito[0]) ? $carrito[0]->compra->count() . ' Productos' : 'No hay productos' }}</div>

                </div>
            </div> 
            @if(isset($carrito)) 
                @foreach ($productos as $producto) 
                    @if (($carrito[0]->id) == $producto->carrito_id) 
                        <div class="row border-top border-bottom"> 
                            <div class="row main align-items-center">
                                <div class="col-md-2 col-5"><img class="img-fluid productimg" src="{{$producto->imagen}}"></div>
                                <div class="col-md-4 col-7">
                                    <div class="row text-muted">{{$producto->marca}}</div>
                                    <div class="row">{{$producto->nombre}}</div>
                                </div>
                                <div class="col-md-3 mt-2 col-5">
                                    {{-- <a href="#" class="text-decoration-none">-</a> --}}
                                    <a href="#" class="border text-decoration-none">
                                        {{$producto->cantidad}}
                                    </a>
                                    {{-- <a href="#" class="text-decoration-none">+</a> --}}
                                </div>
                                <div class="col-md-3 mt-2 col-7">&dollar; {{$producto->monto}} <span class="close">&#10005;</span></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            <div class="back-to-shop"><a href="{{ route('productos.index') }}" class="text-decoration-none">&leftarrow;</a><span class="text-muted">Regresar a la tienda</span></div>
        </div>
        <div class="col-md-4 summary">
            <div><h5><b>Resumen</b></h5></div>
            <hr>
            @if(isset($carrito[0]))
                <div class="row">
                    <div class="col" style="padding-left:0;">Productos {{$carrito[0]->compra->count()}}</div>
                    <div class="col text-right">&dollar; {{$total}}</div>
                </div>
            @endif
            <form method="POST" action="{{ route('carrito.send') }}">
                @csrf
                <input type="hidden" name="carrito_id" value="{{$carrito[0]->id}}">
                <p>DIRECCIÓN</p>
                <select name="direccion_id" id="direccion">
                    <option value="" disabled selected>Seleccione una opción</option>
                    @foreach ($direcciones as $direccion)
                        <option value="{{$direccion->id}}" class="text-muted">{{$direccion->nombreDireccion ?: $direccion->calle}}</option>
                    @endforeach
                    <option class="text-muted" data-url="{{ route('profile.address') }}">Añadir nueva dirección</option>
                </select>
                <p>ENVÍO</p>
                @if ($total > 1299 )
                    <h6><b value="Gratis" name="envio_tipo">Envío gratis</b></h6>
                    <input type="hidden" id="envio_precio" value="0">
                @else
                    <select id="envio_tipo" name="envio_tipo" onchange="actualizarPrecioTotal()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="Regular" class="text-muted">Envío Regular - &dollar; 99.00</option>
                        <option value="Premium" class="text-muted">Envío Premium - &dollar; 159.00</option>
                    </select>
                @endif
                <hr>
                <div class="row">
                    <div class="col">PRECIO TOTAL</div>
                    <div class="col text-right" id="total_muestra">&dollar; {{$total}}</div>
                    <input type="hidden" name="total" id="precio_total" value="{{$total}}">
                </div>
                <button class="btn btn-primary">PROCEDER AL PAGO</button>
            </form>
            
        </div>
    </div>
    
</div>
@endsection
@section('scripts')
    <script>
        document.getElementById('direccion').addEventListener('change', function() {
            if (this.options[this.selectedIndex].getAttribute('data-url')) {
                window.location.href = this.options[this.selectedIndex].getAttribute('data-url');
            }
        });


        function actualizarPrecioTotal() {
            var envioTipo = document.getElementById("envio_tipo").value;
            var envioPrecio = 0;

            if (envioTipo === "Regular") {
                envioPrecio = 99.00;
            } else if (envioTipo === "Premiun") {
                envioPrecio = 159.00;
            }

            var total = parseFloat("{{$total}}");
            var nuevoTotal = total + envioPrecio;

            var inputElement = document.getElementById("precio_total");
            inputElement.value = nuevoTotal.toFixed(2);

            var muestraElement = document.getElementById("total_muestra");
            muestraElement.innerText = "$ " + nuevoTotal.toFixed(2);
        }

    </script>
@endsection