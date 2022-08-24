<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function showLogin()
    {
        if (Auth::check())
            return redirect()->route($this->checkRole());
        else
            return view('login');
    }



    public function checkRole()
    {
        if (Auth::user()->hasRole('super_admin'))
            return 'dashboard';
        else
            return 'home';
    }

    public function login(Request $request)
    {
        Validator::validate($request->all(), [
            'user_email' => ['email', 'required', 'min:3', 'max:50'],
            'password' => ['required', 'min:5']


        ], [
            'user_email.required' => 'this field is required',
            'user_email.min' => 'can not be less than 3 letters',

        ]);

        if (Auth::attempt(['email' => $request->user_email, 'password' => $request->password])) {


            if (Auth::user()->hasRole('super_admin'))
                return redirect()->route('dashboard');
            else
                return redirect()->route('home');
        } else {
            return redirect()->route('login')->with(['message' => 'incorerct username or password or your account is not active ']);
        }
    }

    public function createUser()
    {
        return view('admin.login');
    }
    public function loginUser(Request $request)
    {

        Validator::validate($request->all(), [
            'username' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5'],

        ], [
            'username.required' => 'this field is required',
            'username.min' => 'can not be less than 3 letters',
            'email.unique' => 'there is an email in the table',
            'email.required' => 'this field is required',
            'email.email' => 'incorrect email format',
            'password.required' => 'password is required',
            'password.min' => 'password should not be less than 3',
        ]);

        $u = new User();
        $u->name = $request->username;
        $u->password = Hash::make($request->password);
        $u->email = $request->email;
        if ($u->save()) {
            $u->attachRole('client');
            return redirect()->route('home')
                ->with(['success' => 'user created successful']);
        }
        return back()->with(['error' => 'can not create user']);
    }
    public function registerCompany(Request $request)
    {

        Validator::validate($request->all(), [
            'username' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5'],

        ], [
            'username.required' => 'this field is required',
            'username.min' => 'can not be less than 3 letters',
            'email.unique' => 'there is an email in the table',
            'email.required' => 'this field is required',
            'email.email' => 'incorrect email format',
            'password.required' => 'password is required',
            'password.min' => 'password should not be less than 3',
        ]);

        $u = new User();
        $u->name = $request->username;
        $u->password = Hash::make($request->password);
        $u->email = $request->email;
        if ($u->save()) {
            $u->attachRole('owner');
            return redirect()->route('home')
                ->with(['success' => 'user created successful']);
        }
        return back()->with(['error' => 'can not create user']);
    }




    public function editUser()
    {
        $u = User::find(5);
        if ($u->hasRole('admin')) {
        } else {
        }
    }
    public function resetPassword()
    {
    }
    public function logout()
    {

        Auth::logout();
        return redirect()->route('login');
    }
}
