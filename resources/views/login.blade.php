@extends('layout.home')
@section('login')
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card col-sm-4 login">
        <div class="card-header bg-white border-0">
            <h1 class="text-title text-center">Login</h1>
        </div>
        <div class="card-body">
            <form action="{{route('user_login')}}" method="post">
                @csrf
                <div class="form-login-page my-3">
                    <input
                        title="Username Must Be 4 Characters"
                        class="form-control p-2"
                        type="email" 
                        name="user_email"
                        autocomplete="off"
                        placeholder="Type Your Email" />
                </div>
                <div class="form-login-page my-3">
                    <input 
                        class="form-control p-2" 
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        placeholder="Type Your Password" />
                </div>   
                <input class=" form-control btn btn-primary btn-block" type="submit" name="login" value="Login">
            </form>
            <h1 class="fs-6">Do't have account? <span class="cursor-pointer text-primary">Create account</span></h1>
            <div class="d-none justify-content-between align-items-center account">
                <button class="bg-white p-2 border-primary" data-bs-toggle="modal" data-bs-target="#accountCompany">Account Company</button>
                <button class="bg-white p-2 border-primary" data-bs-toggle="modal" data-bs-target="#accountEmployee">Account Employee</button>
            </div>
        </div>
        
        <!-- End Login Form -->
        <!-- Start Signup Form -->
        {{-- <form class="signup" action="{{route('register')}}" method="post">
        @csrf
            <div class="form-login-page">
                <input
                    class="form-control"
                    type="text" 
                    name="username"
                    autocomplete="off"
                    required
                    placeholder="Enter Your Name" />
            </div>
            <div class="form-login-page">
                <input
                    class="form-control" 
                    type="text"
                    name="email"
                    required
                    placeholder="Enter Your Email" />
            </div>
            <div class="form-login-page">
                <input 
                    class="form-control" 
                    type="password"
                    name="password"
                    autocomplete="new-password"
                    required
                    placeholder="Enter Complex Password" />
            </div>
            <input class="btn btn-success btn-block" id="send" type="submit" name="signup" value="Signup">
        </form>
        <!-- End Signup Form --> --}}
        @if ($errors->any())
            <div class="card-footer border-0 bg-white text-center">
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>   
                @endforeach
            </div>  
        @endif
        
    </div>
</div>

<div class="modal fade" id="accountEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-login-page my-3">
                        <input
                            class="form-control p-2"
                            type="text" 
                            name="username"
                            autocomplete="off"
                            required
                            placeholder="Enter Your Name" />
                    </div>
                    <div class="form-login-page my-3">
                        <input
                            class="form-control p-2" 
                            type="text"
                            name="email"
                            required
                            placeholder="Enter Your Email" />
                    </div>
                    <div class="form-login-page my-3">
                        <input 
                            class="form-control p-2" 
                            type="password"
                            name="password"
                            autocomplete="new-password"
                            required
                            placeholder="Enter Complex Password" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="create account" />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="accountCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('registerCompany')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-login-page my-3">
                        <input
                            class="form-control p-2"
                            type="text" 
                            name="username"
                            autocomplete="off"
                            required
                            placeholder="Enter Your Company Name" />
                    </div>
                    <div class="form-login-page my-3">
                        <input
                            class="form-control p-2" 
                            type="text"
                            name="email"
                            required
                            placeholder="Enter Your Email" />
                    </div>
                    <div class="form-login-page my-3">
                        <input 
                            class="form-control p-2" 
                            type="password"
                            name="password"
                            autocomplete="new-password"
                            required
                            placeholder="Enter Complex Password" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="create account" />
                </div>
            </form>
        </div>
    </div>
</div>
@stop