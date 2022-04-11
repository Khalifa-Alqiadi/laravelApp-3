@extends('admin.layout.master')
@section('login')
<div class="container login-page">
        <h1 class="text-center">
            <span class="selected" data-class="login">Login</span> | 
            <span data-class="signup">Signup</span>
        </h1>
        <!-- Start Login Form -->
        <form class="login" action="{{route('do_login')}}" method="post">
        @csrf
            <div class="form-login-page">
                <input
                    title="Username Must Be 4 Characters"
                    class="form-control"
                    type="email" 
                    name="email_username"
                    autocomplete="off"
                    required
                    placeholder="Type Your Name" />
                    <div class='masg'>user name be empty</div>
            </div>
            <div class="form-login-page">
                <input 
                    class="form-control" 
                    type="password"
                    name="user_pass"
                    autocomplete="new-password"
                    required
                    placeholder="Type Your Password" />
                    <div class='masg'>user name be empty</div>
            </div>
            <input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
        </form>

        <!-- End Login Form -->
</div>
@stop