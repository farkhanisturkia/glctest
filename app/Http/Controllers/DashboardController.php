<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::id()) {
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return view('admin.dashboard');
            }
            else if ($role == 'seles') {
                return view('seles.dashboard');
            }
            else {
                return redirect()->back();
            }
        }
    }
}
