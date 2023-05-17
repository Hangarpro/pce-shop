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
                    <div class="col align-self-center text-right text-muted">{{ isset($carrito[0]) ? $carrito[0]->compra->count() . 'Productos' : 'No hay poductos' }}</div>
                </div>
            </div> 
            @if(isset($carrito)) 
                @for ($i=0; $i < count($productos); $i++)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-md-2 col-5"><img class="img-fluid productimg" src="{{$productos[$i]->imagen}}"></div>
                            <div class="col-md-4 col-7">
                                <div class="row text-muted">{{$productos[$i]->marca}}</div>
                                <div class="row">{{$productos[$i]->nombre}}</div>
                            </div>
                            <div class="col-md-3 mt-2 col-5">
                                <a href="#" class="text-decoration-none">-</a><a href="#" class="border text-decoration-none">
                                    {{$carrito[0]->compra[$i]->cantidad}}
                                </a><a href="#" class="text-decoration-none">+</a>
                            </div>
                            <div class="col-md-3 mt-2 col-7">&dollar; {{$carrito[0]->compra[$i]->monto}} <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                @endfor
            @endif
            <div class="back-to-shop"><a href="#" class="text-decoration-none">&leftarrow;</a><span class="text-muted">Regresar a la tienda</span></div>
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
            <form>
                <p>DIRECCIÓN</p>
                <select id="direccion">
                    @foreach ($direcciones as $direccion)
                        <option class="text-muted">{{$direccion->nombreDireccion ?? $direccion->calle}}</option>
                    @endforeach
                    <option class="text-muted" data-url="{{ route('profile.address') }}">Añadir nueva dirección</option>
                </select>
                <p>ENVÍO</p>
                <select>
                    <option class="text-muted">Envío Regular - &dollar; 99.00</option>
                    <option class="text-muted">Envío Express - &dollar; 159.00</option>
                </select>
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">ENVÍO REGULAR <br>(4 - 6 días)</div>
                <div class="col text-right">&dollar; 99.00</div>
            </div>
            <div class="row">
                <div class="col">PRECIO TOTAL</div>
                <div class="col text-right">&dollar; 1,026.00</div>
            </div>
            <a class="btn btn-primary" href="{{ url('/payment') }}">PROCEDER AL PAGO</a>
        </div>
    </div>
    
</div>
@endsection
@section('scripts')
    <script>
        // Agrega un listener para detectar el cambio de selección en el menú desplegable
        document.getElementById('direccion').addEventListener('change', function() {
            // Verifica si la opción seleccionada tiene un atributo data-url definido
            if (this.options[this.selectedIndex].getAttribute('data-url')) {
                // Redirige a la vista deseada utilizando la función "window.location.href"
                window.location.href = this.options[this.selectedIndex].getAttribute('data-url');
            }
        });
    </script>
@endsection