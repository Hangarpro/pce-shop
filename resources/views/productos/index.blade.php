@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Productos
@endsection

@section('section')
    <h2 class="mt-2">Todos nuestros productos</h2>
    <div class="row ms-1 me-1">
        <div class="card mx-auto col-md-3 col-10 mt-4 pt-4 productdiv">
            <div class="d-flex justify-content-end">
                <span class="badge rounded-pill text-bg-success float-end">Nuevo</span>
            </div>
            <img class='mx-auto img-thumbnail' style="border:none"
                src="{!! asset('images/psg-messi-cover.webp') !!}"
                width="200" height="200"/>
            <div class="card-body text-center mx-auto">
                <h5 class="card-title">Funko Pop Football: PSG - Lionel Messi</h5>
                <p class="card-text">$289</p>
                <button type="button" class="btn btn-info">Ver producto</button>
            </div>
        </div>
        <div class="card mx-auto col-md-3 col-10 mt-4 pt-4 productdiv">
            <div class="d-flex justify-content-end">
                <span class="badge rounded-pill text-bg-success float-end">Nuevo</span>
            </div>
            <img class='mx-auto img-thumbnail' style="border:none"
                src="{!! asset('images/marvel-web-man-cover.webp') !!}"
                width="200" height="200"/>
            <div class="card-body text-center mx-auto">
                <h5 class="card-title">Funko Pop Marvel: SpiderMan - Web Man</h5>
                <p class="card-text">$319</p>
                <button type="button" class="btn btn-info">Ver producto</button>
            </div>
        </div>
        <div class="card mx-auto col-md-3 col-10 mt-4 pt-4 productdiv">
            <div class="d-flex justify-content-end">
                <span class="badge rounded-pill text-bg-success float-end">Nuevo</span>
            </div>
            <img class='mx-auto img-thumbnail' style="border:none"
                src="{!! asset('images/disney100-minnie-mouse-cover.webp') !!}"
                width="200" height="200"/>
            <div class="card-body text-center mx-auto">
                <h5 class="card-title">Funko Pop Disney: Disney 100 - Minnie Mouse Facet</h5>
                <p class="card-text">$319</p>
                <button type="button" class="btn btn-info">Ver producto</button>
            </div>
        </div>
    </div>
    <div class="row ms-1 me-1">
        <div class="card mx-auto col-md-3 col-10 mt-4 pt-4 productdiv">
            <div class="d-flex justify-content-end">
                <span class="badge rounded-pill text-bg-success float-end">Nuevo</span>
            </div>
            <img class='mx-auto img-thumbnail' style="border:none"
                src="{!! asset('images/psg-messi-cover.webp') !!}"
                width="200" height="200"/>
            <div class="card-body text-center mx-auto">
                <h5 class="card-title">Funko Pop Football: PSG - Lionel Messi</h5>
                <p class="card-text">$289</p>
                <button type="button" class="btn btn-info">Ver producto</button>
            </div>
        </div>
        <div class="card mx-auto col-md-3 col-10 mt-4 pt-4 productdiv">
            <div class="d-flex justify-content-end">
                <span class="badge rounded-pill text-bg-success float-end">Nuevo</span>
            </div>
            <img class='mx-auto img-thumbnail' style="border:none"
                src="{!! asset('images/marvel-web-man-cover.webp') !!}"
                width="200" height="200"/>
            <div class="card-body text-center mx-auto">
                <h5 class="card-title">Funko Pop Marvel: SpiderMan - Web Man</h5>
                <p class="card-text">$319</p>
                <button type="button" class="btn btn-info">Ver producto</button>
            </div>
        </div>
        <div class="card mx-auto col-md-3 col-10 mt-4 pt-4 productdiv">
            <div class="d-flex justify-content-end">
                <span class="badge rounded-pill text-bg-success float-end">Nuevo</span>
            </div>
            <img class='mx-auto img-thumbnail' style="border:none"
                src="{!! asset('images/disney100-minnie-mouse-cover.webp') !!}"
                width="200" height="200"/>
            <div class="card-body text-center mx-auto">
                <h5 class="card-title">Funko Pop Disney: Disney 100 - Minnie Mouse Facet</h5>
                <p class="card-text">$319</p>
                <button type="button" class="btn btn-info">Ver producto</button>
            </div>
        </div>
    </div>
@endsection