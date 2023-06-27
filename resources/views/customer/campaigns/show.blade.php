@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Campaign Details</h1>

    <h3>Banners</h3>
    @if ($campaign->banners->isNotEmpty())
    <ul>
        @foreach ($campaign->banners as $banner)
        <li><img src="{{ asset('storage/' . $banner->url) }}" alt="Banner"></li>
        @endforeach
    </ul>
    @else
    <p>No banners available.</p>
    @endif

    <h2>{{ $campaign->name }}</h2>
    <p>Description: {{ $campaign->description }}</p>
    <p>Target: {{ $campaign->target }}</p>
    <p>Status: {{ $campaign->status }}</p>
    <p>Current: {{ $campaign->current }}</p>

    <h3>Packages:</h3>
    <ul>
        @foreach ($campaign->packages as $package)
        <li>
            {{ $package->name }} - Rp{{ $package->price }}
            <a href="{{ route('customer.orders.create', ['campaignId' => $campaign->id, 'packageId' => $package->id]) }}">Place Order</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection