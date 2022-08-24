<?php

namespace App\Http\Controllers\userDashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserCV extends Controller
{
    public function show(User $id)
    {
        return view('userDashboard.user-cv', [
            'user'          => $id,
        ]);
    }
}
