<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('dashboards.admin');
        }

        if ($user->hasRole('vendeur')) {
            return view('dashboards.vendeur');
        }

        if ($user->hasRole('magasinier')) {
            return view('dashboards.magasinier');
        }

        // par défaut
        return view('dashboards.default');
    }
}


