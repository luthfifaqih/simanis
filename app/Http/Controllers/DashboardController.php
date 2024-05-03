<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $title['title'] = 'Dashboard';
        if (Auth::check()) {
            return view('dashboard', $title);
        }

        return redirect('login')->withSuccess('Please login first');
    }
}
