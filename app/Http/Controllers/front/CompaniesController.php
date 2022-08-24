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
        $companies = User::with('companyJob')->get();
        // dd($companies);
        $count = Company::count();
        $jobs = Job::where('is_active', 1)->get();
        return view('front.companies', [
            'jobs'             => $jobs,
            'companies'        => $companies,
            'count'            => $count,
        ]);
    }

    public function details($name)
    {
        $company = User::firstWhere('name', $name);
        return view('front.company-details', [
            'company'       => $company,
        ]);
    }
}
