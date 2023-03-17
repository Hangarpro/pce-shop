@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Home
@endsection

@section('style')
    <link href="{!! asset('css/tiny-slider.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/slider-style.css') !!}" rel="stylesheet">
@endsection

@section('section')
    <!--SLIDER-->
    <div id="myCarousel" class="carousel slider carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="overlay-image" style="background-image:url(images/inicio.jpg)">
                    <div class="slider-container">
                        <h2 class="slider-title">Comics Funko Shop</h2>
                        <p class="slider-txt">Los funko de tus personajes favoritos en un solo lugar</p>
                        <a href="#" class="a-btn">Comprar Ahora</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay-image" style="background-image:url(images/inicio.jpg)">
                    <div class="slider-container">        
                        <h2 class="slider-title">Comics Funko DC</h2>
                        <p class="slider-txt">Los mejores funko de DC están justo aquí</p>
                        <a href="#" class="a-btn">Comprar Ahora</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay-image" style="background-image:url(images/inicio.jpg)">
                    <div class="slider-container">
                        <h2 class="slider-title">Comics Funko Marvel</h2>
                        <p class="slider-txt">Los mejores funko de Marvel están justo aquí</p>
                        <a href="#" class="a-btn">Comprar Ahora</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="overlay-image" style="background-image:url(images/inicio.jpg)">
                    <div class="slider-container">
                        <h2 class="slider-title">Próximamente</h2>
                        <p class="slider-txt">Disfruta de cashback del 21 al 24 de noviembre</p>
                        <a href="#" class="a-btn">Comprar Ahora</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#myCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a href="#myCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
    <!--SLIDER-->

    <!--CARDS-->
    <div class="row ms-1 me-1">
        @for ($i = 0; $i < 8; $i++)
            <div class="card mx-auto col-md-3 col-10 mt-3 pt-4">
                <div class="d-flex justify-content-end">
                    <span class="badge rounded-pill text-bg-success float-end">Nuevo</span>
                </div>
                <img class='mx-auto img-thumbnail' style="border:none"
                    src="{!! asset('images/product-2.png') !!}"
                    width="auto" height="auto"/>
                <div class="card-body text-center mx-auto">
                    <h5 class="card-title">Sofa Chair</h5>
                    <p class="card-text">$1,399</p>
                    <button type="button" class="btn btn-info">Ver producto</button>
                </div>
            </div>
        @endfor 
    </div>
    <!--END CARDS-->

    <!--START TESTIMONIALS-->
    <div class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Testimonials</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">

                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="testimonial-slider">

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
                                                    quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
                                                    velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
                                                    tristique senectus et netus et malesuada fames ac turpis egestas.
                                                    Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
                                                    quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
                                                    velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
                                                    tristique senectus et netus et malesuada fames ac turpis egestas.
                                                    Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio
                                                    quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate
                                                    velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
                                                    tristique senectus et netus et malesuada fames ac turpis egestas.
                                                    Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{!! asset('js/slider.js') !!}"></script>
    <script src="{!! asset('js/tiny-slider.js') !!}"></script>
    <script src="{!! asset('js/custom.js') !!}"></script>
@endsection
