<?php

namespace App\Http\Controllers;

use App\Charts\StatusChart;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(StatusChart $countstatus)
    {
        $title['title'] = 'Dashboard';
        $totaluser = User::count();
        return view('dashboard', $title, ['countstatus' => $countstatus->build()], compact('totaluser'));
    }
}
