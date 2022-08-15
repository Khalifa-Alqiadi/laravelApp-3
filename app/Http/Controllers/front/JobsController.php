<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function show()
    {
        // $jobs = Job::where('is_active', 1)->latest()->get();
        return view('front.jobs');
    }
}
