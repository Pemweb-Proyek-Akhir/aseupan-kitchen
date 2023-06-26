<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();

        $user = Auth::user();

        return view('customer.dashboard', compact('user', 'campaigns'));
    }
}
