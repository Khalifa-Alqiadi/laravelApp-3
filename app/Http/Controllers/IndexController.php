<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show()
    {
        $jobs = Job::where('is_active', 1)->limit(10)->get();
        return view('front.index', [
            'jobs'          => $jobs,
        ]);
    }
}
