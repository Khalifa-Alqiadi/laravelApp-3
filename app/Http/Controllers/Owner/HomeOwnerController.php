<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeOwnerController extends Controller
{
    //
    public function showOwnerDashboard(){
        return view('owner.index');
    }

    public function allJobs(){
        return view('owner.ownerJobs');
    }
    public function EndJobs(){
        return view('owner.ownerJobs');
    }
}
