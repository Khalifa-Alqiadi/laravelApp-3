<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class IndexController extends Controller
{
    public function show()
    {
        $jobs = Job::where('is_active', 1)->limit(10)->get();
        $slider = Job::where('is_active', 1)->latest()->limit(3)->get();
        return view('front.index', [
            'jobs'          => $jobs,
            'slider'        => $slider,
        ]);
    }
}
