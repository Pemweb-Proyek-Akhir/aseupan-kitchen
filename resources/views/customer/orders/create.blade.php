@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Order</h1>

    <h2>Package Information</h2>
    <p>Name: {{ $package->name }}</p>
    <p>Price: Rp{{ $package->price }}</p>

    <form action="{{ route('customer.orders.store') }}" method="POST">
        @csrf
        <input type="hidden" name="campaign_id" value="{{ $campaignId }}">
        <input type="hidden" name="package_id" value="{{ $packageId }}">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required readonly value="{{ $package->price }}">
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" id="total" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="ShopeePay">ShopeePay</option>
                <option value="GoPay">GoPay</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
    </form>
</div>

<script>
    // Mengambil referensi elemen input price, quantity, dan total
    const priceInput = document.getElementById('price');
    const quantityInput = document.getElementById('quantity');
    const totalInput = document.getElementById('total');

    // Event listener untuk menghitung total saat ada perubahan pada price atau quantity
    priceInput.addEventListener('input', calculateTotal);
    quantityInput.addEventListener('input', calculateTotal);

    // Fungsi untuk menghitung total
    function calculateTotal() {
        const price = parseFloat(priceInput.value) || 0;
        const quantity = parseFloat(quantityInput.value) || 0;
        const total = price * quantity;

        // Mengupdate nilai totalInput dengan hasil perhitungan
        totalInput.value = total.toFixed(2);
    }
</script>

@endsection