<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Menampilkan halaman Dashboard setelah login
    public function dashboard()
    {
        // Lakukan logika untuk menampilkan data atau tampilan yang relevan dengan halaman Dashboard
        return view('dashboard');
    }
}
