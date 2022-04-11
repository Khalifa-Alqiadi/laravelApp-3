<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function userLogin(){
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
            return redirect()->route('userDashboard')
            ->with(['success'=>'user created successful']);
        }
        return back()->with(['error'=>'can not create user']);

    }
    public function login(Request $request){
        Validator::validate($request->all(),[
            'user_email'=>['email','required','min:3','max:50'],
            'password'=>['required','min:5']


        ],[
            'user_email.required'=>'this field is required',
            'user_email.min'=>'can not be less than 3 letters', 
           
        ]);

        $user = User::where(['email' => $request->user_email, 'password' => $request->password])->get()->first();
        if($user){
            return view('index');
        }
    }
}
