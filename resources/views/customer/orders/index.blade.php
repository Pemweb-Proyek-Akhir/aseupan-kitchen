@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order List</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($orders->isEmpty())
    <p>No orders found.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Campaign</th>
                <th>Package</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Payment Method</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->campaign->name }}</td>
                <td>{{ $order->package->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone_number }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection