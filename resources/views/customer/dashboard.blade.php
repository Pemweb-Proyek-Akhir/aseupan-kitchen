<!DOCTYPE html>
<html>

<head>
    <title>Customer Dashboard</title>
</head>

<body>
    <h1>Welcome, {{ $user->name }}</h1>

    <h2>Your Profile:</h2>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <h2>Available Campaigns:</h2>
    <ul>
        @foreach($campaigns as $campaign)
        <li>
            <a href="{{ route('customer.campaigns.show', $campaign->id) }}">{{ $campaign->name }}</a>
        </li>
        @endforeach
    </ul>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>

</html>