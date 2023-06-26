<!-- resources/views/customer/orders/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Order</h1>

    <form action="{{ route('customer.orders.store') }}" method="POST">
        @csrf
        <input type="hidden" name="campaign_id" value="{{ $campaignId }}">
        <input type="hidden" name="package_id" value="{{ $packageId }}">

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="ShopeePay">ShopeePay</option>
                <option value="GoPay">GoPay</option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" name="total" id="total" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
    </form>
</div>
@endsection