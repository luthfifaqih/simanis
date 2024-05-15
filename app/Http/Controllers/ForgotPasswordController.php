<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function forgotpassword()
    {
        $title['title'] = 'Lupa Password';
        return view('auth.forget-password', $title);
    }

    public function resetpassword()
    {
        $title['title'] = 'Reset Password';
        return view('auth.reset-password', $title);
    }
}
