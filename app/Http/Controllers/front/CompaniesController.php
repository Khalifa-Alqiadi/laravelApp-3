<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function show()
    {
        // $count = 
        $companies = User::get();
        $top = Company::find(1);
        $jobs = Job::where('is_active', 1)->get();
        return view('front.companies', [
            'jobs'             => $jobs,
            'companies'        => $companies,
            'top'              => $top,
        ]);
    }
}
