<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGuru = Guru::count();
        $totalUser = User::count();

        return view('dashboard', compact(
            'totalGuru',
            'totalUser'
        ));
    }
}