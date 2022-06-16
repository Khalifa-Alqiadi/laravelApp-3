<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profileOwnerController extends Controller
{
    //
    public function ownerProfile(){
        return view('owner.ownerProfile');
    }
}
