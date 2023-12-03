<header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="/"><img width="40px" src="/front/images/logo.jpg" class="W-50" alt="">
                    <h5><strong>TWINSHOTIN-AGRO</strong></h5>
                </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('about-us')}}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('shop-view')}}">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('contact-us')}}">Contact Us</a></li>
                        @if (Route::has('login'))
                                @auth
                                    @if($usertype = Auth::user()->role=="admin")
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/redirects') }}">Dashboard</a></li>
                                    @else
                                    <li class="nav-item"><a class="nav-link" href="{{route('my-orders')}}">My Order(s)</a></li>
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault();
                                                    this.closest('form').submit();"> <i class="fas fa-power-off">Logout</i>
                                            </a>
                                        </form>
                                    @endif
                                @else
                                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                                @endauth
                            @endif
                       
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu">
							<a href="{{route('cart-view')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
								<span class="badge">{{$cartCount}}</span>
								<p>My Cart</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>

        </nav>
        <!-- End Navigation -->
    </header>