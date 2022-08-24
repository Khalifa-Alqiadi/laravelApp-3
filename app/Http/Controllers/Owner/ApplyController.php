<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function apply(Job $id)
    {
        return view('owner.apply', [
            'job'       => $id,
        ]);
    }
}
