<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('customer.orders.index', compact('orders'));
    }

    public function create($campaignId, $packageId)
    {
        $campaign = Campaign::findOrFail($campaignId);
        $package = Package::findOrFail($packageId);

        return view('customer.orders.create', compact('campaign', 'package', 'campaignId', 'packageId'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'campaign_id' => 'required',
            'package_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        // Hitung total berdasarkan paket yang dipilih
        $package = Package::findOrFail($validatedData['package_id']);
        $total = $package->price * $validatedData['quantity'];

        // Buat pesanan baru
        $order = new Order;
        $order->campaign_id = $validatedData['campaign_id'];
        $order->package_id = $validatedData['package_id'];
        $order->quantity = $validatedData['quantity'];
        $order->total = $total;
        $order->payment_method = $validatedData['payment_method'];
        $order->name = $validatedData['name'];
        $order->address = $validatedData['address'];
        $order->phone_number = $validatedData['phone_number'];
        $order->user_id = auth()->user()->id;
        $order->save();

        // Perbarui current pada kampanye
        $campaign = Campaign::findOrFail($validatedData['campaign_id']);
        $campaign->current += $validatedData['quantity'];
        $campaign->save();

        return redirect()->route('customer.orders.index')->with('success', 'Order created successfully');
    }
}
