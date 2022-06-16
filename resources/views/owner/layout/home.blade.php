<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/owner.css')}}">
    <livewire:styles />
    <livewire:scripts />
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <div class="d-flex">
        <div class="navbar-header2  my-5 justify-content-between ">
            <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                <div class=" my-1 px-3 bg-light sidemenu"> </div>
                <div class=" bg-light sidemenu"> </div>
            </button>
        </div>
        <div class="holder aside bg-dark">
            <!-- Sidebar Holder -->
            <aside id="sidebar">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <div class="cornerstyle px-4 pt-3">
                            <br>
                            <a class="navbar-brand border p-2 text-light mx-auto logo-box1" href="#">CAC</a>
                        </div>
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
                       <a href="ownerProfile"  class="{{ Request::segment(1) === 'profile' ? 'active' : 'text-light' }} p-3 text-light "><h6 ><i class="bi bi-person-bounding-box active mx-2">  </i>  المعلومات الشخصية</h6></a> 

                    </li>
                   
                    <li class="active dropdown2">
                        <h6> <a class="dropdown-toggle text-light py-3" data-toggle="collapse"
                        aria-expanded="false"> <i class="bi bi-menu-button-fill active mx-4"></i> إدارة
                        طلبات المزايدة</a></h6>
                        <ul class="collapse list-unstyled fs-6" id="manage2">
                            <li><a href="" class="{{ Request::segment(1) === 'AuctionCars' ? 'active' : 'text-light' }} text-light p-3">  <i class="bi bi-clipboard-check active me-5 p-2"></i> سيارات تمت المزايدة عليها</a></li>
                            <li><a href="" class="{{ Request::segment(1) === 'UserUncomplateAuctions' ? 'active' : 'text-light' }}text-light  p-3"><i class="bi bi-clipboard-x  active me-5 p-2"></i> المزادات الغير مكتملة الشراء</a></li>
                            <li><a href="" class="{{ Request::segment(1) === 'UserComplateAuctions' ? 'active' : 'text-light' }} text-light  p-3"> <i class="bi bi-clipboard-check active me-5 p-2"></i> المزادات المكتملة</a></li>


                        </ul>
                    </li>
                    <li>  <a href="" class="card-link active  mt-5 mb-2 text-center"> العودة للرئيسية <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a></li>
                </ul>
              
                <ul class="list-unstyled  fs-6 py-4">
                    
                    <div class="d-flex flex-wrap justify-content-around w-50 m-auto">
                        <div class="fa fa-facebook  text-light"></div>
                        <div class="fa fa-instagram  text-light"></div>
                        <div class="fa fa-whatsapp  text-light"></div>
                        <div class="fa fa-facebook text-light"></div>
                        <div class="fa  fa-envelope-o text-light"></div>
                    </div>
                    <li class="w-100"><a
                            class="nav-item text-center contact text-light fs-5 py-2  mt-3 mx-5 d-block px-3">
                            777 777 777<i class="fa fa-phone px-2 fs-4"></i></a>
                    </li>
                </ul>
            </aside>



            <!-- Page Content Holder -->



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
                    <ul class="navbar-nav w-100 me-auto mb-2 mb-lg-0">
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
    <script src="{{ URL::asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{ URL::asset('js/login.js')}}"></script> --}}
    <script src="{{ URL::asset('js/main.js')}}"></script>
    <livewire:scripts />
    
</body>
</html>


