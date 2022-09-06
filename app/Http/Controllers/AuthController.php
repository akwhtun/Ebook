<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function checkAuth()
    {
        $role = Auth::user()->role;
        if ($role == "admin") {
            return redirect()->route('book#list');
        } else {
            return redirect()->route('book#all');
        }
    }

    public function registerPage()
    {
        return view('registerPage');
    }

    public function loginPage()
    {
        return view('loginPage');
    }
}