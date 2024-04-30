<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $title['title'] = 'Masuk';
        return view('auth.login', $title);
    }
}
