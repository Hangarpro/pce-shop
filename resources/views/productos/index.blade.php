@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Productos
@endsection

@section('section')
    <h2 class="mt-2">Todos nuestros productos</h2>
    <!--CARDS-->
    <div class="row ms-1 me-1">
        @foreach ($productos as $num=>$producto)
            @if($num % 3 == 0)
                <div class="row ms-1 me-1"></div>
            @endif
            <div class="card mx-auto col-md-3 col-10 mt-4 pt-4 productdiv">
                <div class="d-flex justify-content-end">
                    <span class="badge rounded-pill text-bg-warning float-left">{{$producto->marca}}</span>
                    <span class="badge rounded-pill {{ getBadgeColor($producto->tipo) }} float-end">{{$producto->tipo}}</span>
                </div>
                <img class='mx-auto img-thumbnail' style="border:none"
                    src="{{$producto->imagen}}"
                    width="200" height="200"/>
                <div class="card-body text-center mx-auto">
                    <h5 class="card-title">{{$producto->nombre}}</h5>
                    <p class="card-text">${{$producto->precio}}</p>
                    <a type="button" href="{{ route('productos.show', ['id'=>$producto->id]) }}" class="btn btn-info">Ver producto</a>

                </div>
            </div>
        @endforeach 
    </div>
    <!--END CARDS-->
    <div class="mt-3 d-flex justify-content-center">
        {{ $productos->links('pagination::bootstrap-4') }}
    </div>
@endsection