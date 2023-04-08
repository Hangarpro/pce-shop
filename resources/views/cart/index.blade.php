@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Log In
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
                    <div class="col align-self-center text-right text-muted">3 productos</div>
                </div>
            </div>    
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-md-2 col-5"><img class="img-fluid productimg" src={!! asset('images/psg-messi-cover.webp') !!}></div>
                    <div class="col-md-4 col-7">
                        <div class="row text-muted">Football</div>
                        <div class="row">PSG - Lionel Messi</div>
                    </div>
                    <div class="col-md-3 mt-2 col-5">
                        <a href="#" class="text-decoration-none">-</a><a href="#" class="border text-decoration-none">1</a><a href="#" class="text-decoration-none">+</a>
                    </div>
                    <div class="col-md-3 mt-2 col-7">&dollar; 289.00 <span class="close">&#10005;</span></div>
                </div>
            </div>
            <div class="row">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid productimg" src={!! asset('images/psg-messi-cover.webp') !!}></div>
                    <div class="col-4">
                        <div class="row text-muted">Football</div>
                        <div class="row">PSG - Lionel Messi</div>
                    </div>
                    <div class="col-3">
                        <a href="#" class="text-decoration-none">-</a><a href="#" class="border text-decoration-none">1</a><a href="#" class="text-decoration-none">+</a>
                    </div>
                    <div class="col-3">&dollar; 289.00 <span class="close">&#10005;</span></div>
                </div>
            </div>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid productimg" src={!! asset('images/psg-messi-cover.webp') !!}></div>
                    <div class="col-4">
                        <div class="row text-muted">Football</div>
                        <div class="row">PSG - Lionel Messi</div>
                    </div>
                    <div class="col-3">
                        <a href="#" class="text-decoration-none">-</a><a href="#" class="border text-decoration-none">1</a><a href="#" class="text-decoration-none">+</a>
                    </div>
                    <div class="col-3">&dollar; 289.00 <span class="close">&#10005;</span></div>
                </div>
            </div>
            <div class="back-to-shop"><a href="#" class="text-decoration-none">&leftarrow;</a><span class="text-muted">Regresar a la tienda</span></div>
        </div>
        <div class="col-md-4 summary">
            <div><h5><b>Resumen</b></h5></div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">Productos 3</div>
                <div class="col text-right">&dollar; 927.00</div>
            </div>
            <form>
                <p>DIRECCIÓN</p>
                <select>
                    <option class="text-muted">Casa del pino</option>
                    <option class="text-muted">Añadir nueva dirección</option>
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