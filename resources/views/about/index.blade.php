@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Acerca de nosotros
@endsection

@section('section')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1 class="d-flex justify-content-center">Acerca de nosotros</h1>
                        <p class="mb-4 d-flex justify-content-center">Somos una tienda especializada en el estilo de vida de
                            la cultura pop. Brindamos conexión con la cultura pop con una línea de productos centrada en
                            las figuras de vinilo "Funko Pop" y un catálogo en constante crecimiento.</p>
                        <p class="d-flex justify-content-center"><a href="" class="btn btn-secondary me-2">Ver
                                productos</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="d-flex justify-content-center">
                        <img src="images/cover.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">¿Por qué elegirnos?</h2>
                    <p>En Pop Culture Emporium buscamos seguir mejorando como empresa y por ello cada vez intentamos ofrecer
                        las mejores opciones para el cliente.</p>

                    <div class="row my-5">
                        <div class="col-12 col-md-12">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/truck.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Envío rápido &amp; gratuito</h3>
                                <p>Colaboramos con las mejores paqueterías del país, teniendo un precio estándar y
                                    competitivo para cualquiero lugar donde necesiten llegar
                                    nuestros productos, además de ofrecer envío gratis en compras superiores a $1,299.00
                                    MXN.
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/support.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Soporte al usuario</h3>
                                <p>El usuario es lo más importante para nosotros, por eso ofrecemos distintos medios de
                                    contacto que se pueden encontrar en la sección <a href="{{url('/contact')}}"> Contáctanos</a>
                                    para una fácil comunicación.
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="images/bag.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Compras rápidas y sencillas</h3>
                                <p>La interfaz de Pop Culture Emporium está pensada para una fácil y amigable navegación,
                                    siendo actualizada de manera constante para que el usuario
                                    pueda encontrar y compras sus productos favoritos de manera sencilla.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="images/superman-about.png" alt="Image" class="img-fluid">
                    </div>
                </div>

                <div class="untree_co-section">
                    <div class="container">

                        <div class="row mb-5">
                            <div class="col-lg-5 mx-auto text-center">
                                <h2 class="section-title">Nuestro equipo</h2>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">

                            <!-- Start Column 1 -->
                            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                                <img src="images/person_1.jpg" class="img-fluid mb-5">
                                <h3 clas><a href="https://www.facebook.com/Booshkenham/" target="_blank"><span class="">Jesús</span> Carlos</a></h3>
                                <span class="d-block position mb-4">CEO, Fundador, Diseñador.</span>
                                <p>Nacido en Mexicali, Baja California, siempre tuvo un gusto por lo cómics y la cultura geek, lo 
                                    cual lo llevó a su afición por los juguetes de vinil, pasión que con orgullo ha compartido desde chico y 
                                    ahora desea compartir con el mundo.
                                </p>
                            </div>
                            <!-- End Column 1 -->

                            <!-- Start Column 2 -->
                            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                                <img src="images/person_2.jpg" class="img-fluid mb-5">

                                <h3 clas><a href="#" target="_blank"><span class="">Bruno</span> Encarnación</a></h3>
                                <span class="d-block position mb-4">Co-fundador, Analista, Backend.</span>
                                <p>Jugador de corazón, programador por vocación. El trabajo de este paceño lo ha llevado a colaborar con gente
                                    que comparte su amor por la cultura pop, y con su habilidades de programación se convirtió en un miembro esencial
                                    de este proyecto.
                                </p>

                            </div>
                            <!-- End Column 2 -->

                            <!-- Start Column 3 -->
                            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                                <img src="images/person_3.jfif" class="img-fluid mb-5">
                                <h3 clas><a href="https://www.facebook.com/mrchococrispis" target="_blank"><span class="">Moisés</span> Moreno</a></h3>
                                <span class="d-block position mb-4">Puso dinero para el negocio, Tortas 24/7.</span>
                                <p>Otaku por excelencia, en los inicios de la empresa fue fundamental su aportación de capital, la cual
                                    logró que este proyecto siguiera en pie, además de conocer los animes del momento para integrar los personajes
                                    a nuestra tienda.
                                </p>
                            </div>
                            <!-- End Column 3 -->



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
