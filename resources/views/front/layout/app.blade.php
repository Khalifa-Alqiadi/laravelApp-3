<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">

    <livewire:styles />
    <livewire:scripts />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">YemenUp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) === 'home' ? 'text-warning' : 'text-light' }}" aria-current="page" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('jobs')}}" class="nav-link {{ Request::segment(1) === 'jobs' ? 'text-warning' : 'text-light' }}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('companies-front')}}" class="nav-link {{ Request::segment(1) === 'companies' ? 'text-warning' : 'text-light' }}">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="include/about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/include/contact.html">Contact</a>
                    </li>
                    @if(Auth::user() != null)
                        
                        <li class=" nav-item position-relative">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->hasRole('owner'))
                                    <li><a class="dropdown-item" href="ownerDashboard">Owner Dashboard</a></li>
                                @elseif(Auth::user()->hasRole('client'))
                                    <li><a class="dropdown-item" href="userDashboard">User Dashboard</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{route('login')}}" class="nav-link">
                                Login/Signup
                            </a>
                        </li>
                    @endif
                </ul>
                
            </div>
        </div>
    </nav>
    
    @yield('slider')
    
    <!-- @yield('index') -->

    @yield('content')
    <section id="card" class="container">
    </section>
    
    <section id="all-comp">
        @yield('AllComps')
    </section>
    @yield('details')
    @yield('login')
    <!-- Start Footer Section -->
<section id="footer" class="bg-dark">
    <div class="footer">
        <h1>Yemen UP</h1>
        <div class="icons">
            <img src="{{ URL::asset('images/icon.png')}}" alt="" srcset="">
            <img src="{{ URL::asset('images/icon1.png')}}" alt="" srcset="">
            <img src="{{ URL::asset('images/icon2.png')}}" alt="" srcset="">
            <img src="{{ URL::asset('images/icon3.png')}}" alt="" srcset="">
        </div>
        <p>Copyright &copy YemenUP</p>
    </div>
</section>
    <!-- End Footer Section -->

    <script src="{{ URL::asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{ URL::asset('js/login.js')}}"></script> --}}
    {{-- <script src="{{ URL::asset('js/js.js')}}"></script> --}}
    <script src="{{ URL::asset('js/swiper-bundle.min.js')}}"></script>
    <script src="{{ URL::asset('js/main.js')}}"></script>
    {{-- <livewire:scripts /> --}}
    @stack('scripts_after')
    <script>
        
    </script>
</body>
</html>