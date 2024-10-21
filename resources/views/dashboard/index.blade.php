@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl mb-6">Dashboard Carbon Tracker</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Widget: Total Users -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold">Total Users</h2>
                <p class="text-gray-500">{{ $data['users'] }}</p>
            </div>

            <!-- Widget: Total Sales -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold">Total Credit Carbon</h2>
                <p class="text-gray-500">{{ $data['sales'] }}</p>
            </div>

            <!-- Widget: Total Revenue -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold">Total Revenue</h2>
                <p class="text-gray-500">${{ number_format($data['revenue'], 2) }}</p>
            </div>

            <!-- Widget: Active Projects -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold">Active Projects</h2>
                <p class="text-gray-500">{{ $data['activeProjects'] }}</p>
            </div>
        </div>

        <!-- Chart -->
        <div class="mt-10 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4">Carbon Credit Overview</h2>
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Carbon Credit',
                    data: [120, 190, 300, 500, 200, 300],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
