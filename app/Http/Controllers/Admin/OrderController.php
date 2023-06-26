<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Campaign;
use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $campaigns = Campaign::all();
        $packages = Package::all();
        return view('admin.orders.create', compact('users', 'campaigns', 'packages'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'campaign_id' => 'required',
            'package_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'payment_method' => 'required',
        ]);

        $data = $request->all();
        $data['total'] = $request->input('price') * $request->input('quantity');

        Order::create($data);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();
        $campaigns = Campaign::all();
        $packages = Package::all();

        return view('admin.orders.edit', compact('order', 'users', 'campaigns', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'campaign_id' => 'required',
            'package_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'payment_method' => 'required',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }
}
