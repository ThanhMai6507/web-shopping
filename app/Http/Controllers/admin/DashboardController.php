<?php

declare(strict_types=1);

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check() && Auth::user()->type == 1) {
            return view('backend.dashboard.index');
        }
        return view('user.dashboard.index');
    }
}
