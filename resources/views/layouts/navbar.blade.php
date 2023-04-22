<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <img src="{!! asset('images/cover.png') !!}" alt="" width="50">
        <a class="navbar-brand" href="{{url('/')}}">PCE<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"> 
                    <a class="nav-link" href="{{url('/')}}">
                        Home
                    </a>
                </li>
                <li class="{{ (request()->segment(1) == 'productos') ? 'active' : '' }}"> 
                    <a class="nav-link" href="{{url('/productos')}}">
                        Productos
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('/about')}}">
                        Acerca de nosotros
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{url('/contact')}}">
                        Contáctanos
                    </a>
                </li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li>
                    
                    @if (session()->has('loginId'))
                        <a class="nav-link" href="{{url('/profile')}}">
                            <img src="{!! asset('images/user.svg') !!}">
                        </a>
                    @else
                        <a class="nav-link" href="{{url('/login')}}">
                            <img src="{!! asset('images/user.svg') !!}">
                        </a>
                    @endif
                    
                </li>
                <li>
                    
                    @if(session()->has('loginId'))
                        
                        <a class="nav-link" href="{{ url('/cart') }}">
                            <img src="{!! asset('images/cart.svg') !!}">
                        </a>
                    @endif
                    
                        
                    
                    
                </li>
            </ul>
        </div>
    </div>
        
</nav>
