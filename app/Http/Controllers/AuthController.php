<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            if (Auth::user()->user_type == 0) {
                // User customer, arahkan ke customer-dashboard
                return redirect()->route('customer.dashboard');
            } elseif (Auth::user()->user_type == 1) {
                // User admin, arahkan ke admin-dashboard
                return redirect()->route('admin.dashboard');
            }
        }

        // Login gagal
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
