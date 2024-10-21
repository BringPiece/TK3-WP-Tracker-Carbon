<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="flex">
        <div class="w-64 bg-gray-800 h-screen text-white">
            <div class="p-6 text-center">
                <h1 class="text-2xl font-semibold">Admin Dashboard</h1>
            </div>
            <nav class="mt-10">
                <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 hover:bg-gray-700">
                    Dashboard
                </a>
                <!-- Add more menu items -->
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

</body>

</html>
