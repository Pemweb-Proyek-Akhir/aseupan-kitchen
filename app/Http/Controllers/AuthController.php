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
        // Validasi data yang dikirimkan oleh pengguna
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Melakukan proses autentikasi
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            if (Auth::user()->user_type == 0) {
                // Jika user_type = 0 (customer), arahkan ke halaman customer dashboard
                return redirect()->route('customer.dashboard');
            } elseif (Auth::user()->user_type == 1) {
                // Jika user_type = 1 (admin), arahkan ke halaman admin dashboard
                return redirect()->route('admin.dashboard');
            }
        } else {
            // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
            return redirect()->route('login')->with('error', 'Email atau password salah.');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
