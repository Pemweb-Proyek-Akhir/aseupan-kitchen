<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin\'s Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .menu-button {
            display: block;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .menu-button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Selamat datang di Dashboard Admin!") }}
                </div>
                <div class="menu-container">
                    <a href="{{ route('admin.index') }}" class="menu-button">Manage Products</a>
                    <a href="{{ route('admin.create') }}" class="menu-button">Create Product</a>
                    <a href="{{ route('admin.orders') }}" class="menu-button">Manage Orders</a>
                    <a href="{{ route('admin.users') }}" class="menu-button">Manage Users</a>
                    <!-- Add more menu items as needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>