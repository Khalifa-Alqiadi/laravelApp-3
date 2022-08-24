<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/owner.css')}}">
    <livewire:styles />
    <livewire:scripts />
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
    <div class="d-flex">
        <div class="navbar-header2  my-5 justify-content-between ">
            <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                <div class=" my-1 px-3 bg-light sidemenu"> </div>
                <div class=" bg-light my-1 px-2 sidemenu"> </div>
                <div class=" bg-light sidemenu"> </div>
            </button>
        </div>
        <div class="holder aside bg-dark mobile">
            <!-- Sidebar Holder -->
            <aside id="sidebar">
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="logo">
                        <a class="navbar-brand border p-2 text-light mx-auto logo-box1" href="#">{{Auth::user()->name}}</a>
                    </div>
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                            <div class="menu my-1  bg-light"> </div>
                            <div class="menu bg-light"> </div>
                        </button>
                    </div>
                </div>
                <ul class="list-unstyled components fs-6 mt-4 ">
                    <li>
                        <a href="ownerDashboard" 
                        class="{{ Request::segment(1) === 'UserDash' ? 'active' : 'text-light' }} px-3 py-3 text-light"><h6 ><i class="bi bi-house-fill active mx-2"></i>Home</h6></a>
                    </li>
                    <li>
                        <a href="all_jops" 
                        class="{{ Request::segment(1) === 'UserDash' ? 'active' : 'text-light' }} px-3 py-3 text-light"><h6 ><i class="bi bi-house-fill active mx-2"></i>All Jops</h6></a>
                    </li>
                    <li>
                        <a href="end_jobs"  class="{{ Request::segment(1) === 'wallet' ? 'active' : 'text-light' }} p-3 text-light"><h6><i class="bi bi-cash-stack active mx-2">  </i> End Jops</h6></a>

                    </li>
                    <li>
                       <a href="ownerProfile"  class="{{ Request::segment(1) === 'profile' ? 'active' : 'text-light' }} p-3 text-light "><h6 ><i class="bi bi-person-bounding-box active mx-2">  </i>profile</h6></a> 
                    </li>
                    <li>  <a href="" class="card-link active  mt-5 mb-2 text-center"> العودة للرئيسية <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a></li>
                </ul>
            </aside>

        </div>
        <div class="w-100"  style="">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <a class="navbar-brand col-md-2" href="#">YemenUp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse col-md-8 navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav w-100 me-auto mb-2 mb-lg-0 bg-dark">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="include/jobs.html">All Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="companies">All Comps</a>
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
                                    @if(Auth::user()->hasRole('admin'))
                                        <li><a class="dropdown-item" href="ownerDashboard">Owner Dashboard</a></li>
                                    @elseif(Auth::user()->hasRole('client'))
                                        <li><a class="dropdown-item" href="userDashboard">User Dashboard</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="logout">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="login" class="nav-link">
                                    Login/Signup
                                </a>
                            </li>
                        @endif
                    </ul>
                    
                </div>
            </div>
        </nav>
        <div class="w-100 ">


            @yield('content')
            {{-- <livewire:owner-profile /> --}}
        </div>
        </div>
    </div>
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
    <script src="{{ URL::asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{ URL::asset('js/login.js')}}"></script> --}}
    <script src="{{ URL::asset('js/main.js')}}"></script>
    
    {{-- <livewire:scripts /> --}}
    @stack('scripts_after')
</body>
</html>


