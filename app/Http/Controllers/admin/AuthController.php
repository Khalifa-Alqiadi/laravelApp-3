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
    //

    public function listAll(){

        $users=User::where('is_active',1)
        ->where('email_verified_at','!=',NULL)
        ->orWhere('name','like','%af%')
        ->orderBy('user_id','desc')
       // ->take(2)
        ->get();
        //$user=User::find(1);
        //return response($user);
        return view('admin.users.list_users')
        ->with('allUsers',$users);
    }

    public function showLogin(){
        if(Auth::check())
        return redirect()->route($this->checkRole());
        else 
        return view('admin.login');
    }



    public function checkRole(){
        if(Auth::user()->hasRole('admin'))
        return 'dashboard';
            else 
            return 'home';
    }

    public function login(Request $request){
        Validator::validate($request->all(),[
            'email_username'=>['email','required','min:3','max:50'],
            'user_pass'=>['required','min:5']


        ],[
            'email_username.required'=>'this field is required',
            'email_username.min'=>'can not be less than 3 letters', 
           
        ]);

        if(Auth::attempt(['email'=>$request->email_username,'password'=>$request->user_pass,'is_active'=>1])){

            
            if(Auth::user()->hasRole('admin'))
            return redirect()->route('dashboard');
            else 
            return redirect()->route('home');

        
        }
        else {
            return redirect()->route('login')->with(['message'=>'incorerct username or password or your account is not active ']);
        }

        
    }

    public function createUser(){
        return view('admin.logins');
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
            $u->attachRole('admin');
            return redirect()->route('home')
            ->with(['success'=>'user created successful']);
        }
        return back()->with(['error'=>'can not create user']);

    }

    public function registersss(Request $request){

        Validator::validate($request->all(),[
            'full_name'=>['required','min:3','max:50'],
            'u_email'=>['required','email','unique:elib_users,email'],
            'user_pass'=>['required','min:5'],
            'confirm_pass'=>['same:user_pass']


        ],[
            'full_name.required'=>'this field is required',
            'full_name.min'=>'can not be less than 3 letters', 
            'u_email.unique'=>'there is an email in the table',
            'u_email.required'=>'this field is required',
            'u_email.email'=>'incorrect email format',
            'user_pass.required'=>'password is required',
            'user_pass.min'=>'password should not be less than 3',
            'confirm_pass.same'=>'password dont match',


        ]);

        $u=new User();
        $u->name=$request->full_name;
        $u->password=Hash::make($request->user_pass);
        $u->email=$request->u_email;
       
        if($u->save()){
            $u->attachRole('admin');
            return redirect()->route('home')
            ->with(['success'=>'user created successful']);
        }

      
        return back()->with(['error'=>'can not create user']);

    }


    public function editUser(){
        $u=User::find(5);
        if($u->hasRole('admin'))
        {
            
        }
        else {
            
        }
    }
    public function resetPassword(){

    }
    public function logout(){

        Auth::logout();
        return redirect()->route('login');

    }

}
