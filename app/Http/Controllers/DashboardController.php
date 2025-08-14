<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard() {

        $user = Auth::authenticate();

        if($user->role === 'admin') {
            return view('admin.dashboard', ['user' => $user]);

        } else if($user->role === 'staff') {
            return view('staff.dashboard', ['user' => $user]);
            
        }else {
            return view('student.dashboard',['user' => $user]);

        }
    }

}
