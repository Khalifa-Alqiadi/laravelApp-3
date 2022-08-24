<?php

namespace App\Http\Controllers\userDashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show(User $id)
    {
        if (Auth::id() == $id->id) {
            return view('userDashboard.user-profile', [
                'user'          => $id,
            ]);
        } else {
            return back();
        }
    }
}
