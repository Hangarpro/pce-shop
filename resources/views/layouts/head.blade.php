<meta charset="utf-8" />
<title>@yield('titulo_pagina')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}">
<!-- Bootstrap Css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/613e4ee7d3.js" crossorigin="anonymous"></script>
<!-- App Css-->
<link href="{!! asset('css/style.css') !!}" id="app-style" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{!! asset('css/cambios.css') !!}" media="screen" />

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('style')