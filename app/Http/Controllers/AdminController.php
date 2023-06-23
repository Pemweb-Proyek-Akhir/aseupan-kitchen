<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch all products
        $products = Product::all();

        // Fetch all orders
        $orders = Order::all();

        // Fetch all users
        $users = User::all();

        return view('admin.index', compact('products', 'orders', 'users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->detail = $request->input('detail');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('admin.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->detail = $request->input('detail');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('admin.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.index')->with('success', 'Product deleted successfully.');
    }

    // Order methods
    public function showOrders()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    // User methods
    public function showUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
