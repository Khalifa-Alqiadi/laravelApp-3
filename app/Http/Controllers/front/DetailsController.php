<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function show(Job $id)
    {
        $jobs = Job::where('is_active', 1)->latest()->limit(3)->get();
        return view('front.details', [
            'job'           => $id,
            'jobs'          => $jobs,
        ]);
    }
}
