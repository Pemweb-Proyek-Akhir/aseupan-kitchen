<!-- resources/views/customer/campaigns/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Campaigns</h1>
    <ul>
        @foreach ($campaigns as $campaign)
        <li><a href="{{ route('customer.campaigns.show', $campaign) }}">{{ $campaign->name }}</a></li>
        @endforeach
    </ul>
</div>
@endsection