<!-- resources/views/customer/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<h1>Welcome, {{ $user->name }}</h1>
<p>Email: {{ $user->email }}</p>
<!-- Tampilkan informasi profil lainnya -->

<h2>Available Campaigns</h2>
@foreach ($campaigns as $campaign)
<div class="campaign">
    <h3>{{ $campaign->name }}</h3>
    @if ($campaign->banners->isNotEmpty())
    <img src="{{ asset('storage/' . $campaign->banners->first()->url) }}" alt="Campaign Banner">
    @endif
    <p>{{ $campaign->description }}</p>
    <a href="{{ route('customer.campaigns.show', $campaign->id) }}">View Details</a>
</div>
@endforeach
<!-- <ul>
    @foreach ($campaigns as $campaign)
    <li><a href="{{ route('customer.campaigns.show', $campaign) }}">{{ $campaign->name }}</a></li>
    @endforeach
</ul> -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
@endsection