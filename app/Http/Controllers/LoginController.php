<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function userLogin(){
        if(Auth::check())
        return redirect()->route($this->checkRole());
        else 
        return view('logins');
    }
    public function loginUser(Request $request){

        Validator::validate($request->all(),[
            'username'=>['required','min:3','max:10'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','min:5'],

        ],[
            'username.required'=>'this field is required',
            'username.min'=>'can not be less than 3 letters', 
            'email.unique'=>'there is an email in the table',
            'email.required'=>'this field is required',
            'email.email'=>'incorrect email format',
            'password.required'=>'password is required',
            'password.min'=>'password should not be less than 3',
        ]);

        $u=new User();
        $u->name=$request->username;
        $u->password=Hash::make($request->password);
        $u->email=$request->email;
        if($u->save()){
            $u->attachRole('client');
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }
        return back()->with(['error'=>'can not create user']);

    }
    public function checkRole(){
        if(Auth::user()->hasRole('admin'))
        return 'dashboard';
            else 
            return 'home';
    }
    // function login(Request $request){
    //     $name =$request->username;
    //     $password = $request->password;
    //     $pass = sha1($password);
    //     $user = DB::table('users')->where('name', $name)->where('password', $pass)->get();
    //     foreach($user as $u){
    //         session_start();
    //         $_SESSION['user'] = $u->name;
    //         $_SESSION['userid'] = $u->id;
    //         $userSession = $_SESSION['user'];
    //         $userIdSession = $_SESSION['userid'];
    //     }
    //     return view('layout.home', ['userSession'=> $userIdSession]);
    // }
    public function login(Request $request){
        Validator::validate($request->all(),[
            'user_email'=>['email','required','min:3','max:50'],
            'password'=>['required','min:5']


        ],[
            'user_email.required'=>'this field is required',
            'user_email.min'=>'can not be less than 3 letters', 
           
        ]);

        if(Auth::attempt(['email'=>$request->user_email,'password'=>$request->password,'is_active'=>1])){

            
            if(Auth::user()->hasRole('client'))
            return redirect()->route('userDashboard');
            else 
            return redirect()->route('dashboard');

        
        }
        else {
            return redirect()->route('logins')->with(['message'=>'incorerct username or password or your account is not active ']);
        }

        
    }
}
