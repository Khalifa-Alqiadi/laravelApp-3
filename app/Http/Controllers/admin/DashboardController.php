<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function __construct()
    {
        
    }

    
    //

    public function dashboard(){
       
        //return view('admin.dashboard');

        $user=User::with(['profile','products'])->where('user_id',6)->get()->first();
        
        //return $user->profile->facebook;
        return response($user);

    }

    public function adminDash(){
        return view('admin.dashboard');

    }
}
