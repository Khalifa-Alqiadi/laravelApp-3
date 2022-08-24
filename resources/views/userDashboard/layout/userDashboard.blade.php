<?php //session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8" />
         <title></title>
         <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/jquery.selectBoxIt.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/control.css')}}">
         <livewire:styles />
        <livewire:scripts />
    </head>
    <body>
        <nav class="navbar mb-0 navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="logo">
                            <a class="navbar-brand p-2 text-light mx-auto logo-box1" href="{{route('home')}}">Yemen <span>UP</span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            khalifa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2 bg-dark">
                    <div class="d-flex flex-column mt-4 align-items-cinter justify-content-start silderbar"> 
                        @if (isset(Auth::user()->profile[0]))
                            <img src="{{URL::asset('images/'. Auth::user()->profile->avatar)}}" alt="" class="m-2"> 
                        @else
                            <img src="{{URL::asset('images/'. Auth::user()->avatar)}}" alt="" class="m-2">
                        @endif
                        
                        <h2 class="mt-3 text-white">{{Auth::user()->name}}</h2>
                        <ul>
                            <li class="nav-item p-2 fs-5"><a href="{{route('user-profile.show', Auth::id(), Auth::user()->name)}}" class="text-light">Your profile</a></li>
                            <li class="nav-item p-2 fs-5"><a href="{{route('userCV.show', Auth::id())}}" class="text-light">Your CV</a></li>
                            <li class="nav-item p-2 fs-5"><a href="{{route('userDashboard')}}" class="text-light">Your Information</a></li>
                        </ul>   
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
        <div clase="footer">
            
        </div>
        
        <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{ URL::asset('js/ajax.js')}}"></script>
        <livewire:scripts />
    </body>
</html>