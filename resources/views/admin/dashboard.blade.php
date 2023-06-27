<!-- <!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body> -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('admin.campaign.index') }}">Manage Campaigns</a></li>
        <li><a href="{{ route('admin.orders.index') }}">Manage Orders</a></li>
        <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
        <li><a href="{{ route('admin.packages.index') }}">Manage Packages</a></li>
    </ul>
</div>

<!-- <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form> -->
@endsection
<!-- </body> -->

<!-- </html> -->