<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TheBrightSide - Home</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback for local development: link to your Tailwind CSS build -->
        <link rel="stylesheet" href="/css/tailwind.css">
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18]">
    <!-- Header -->
    <header class="mx-auto p-6 flex items-center justify-between bg-white dark:bg-gray-900 shadow-md dark:shadow-lg">
    <div class="text-2xl font-bold text-gray-900 dark:text-white">TheBrightSide</div>
    <nav class="space-x-4">
        <a href="/" class="text-gray-700 dark:text-gray-300 hover:text-black dark:hover:text-white">Home</a>

        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-700 rounded text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-700 rounded text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800">
                    Login
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-700 rounded text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800">
                        Register
                    </a>
                @endif
            @endauth
        @endif
    </nav>
</header>


<!-- Hero Section -->
<section class="container mx-auto px-6 py-20 text-center bg-gray-100 dark:bg-gray-900 rounded-lg shadow-md dark:shadow-lg">
    <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-4">
        Welcome to TheBrightSide
    </h1>
    <p class="text-xl text-gray-700 dark:text-gray-300 mb-8">
        Your hub for all creative content—videos, blogs, music, and more.
    </p>
    <a href="/content" 
       class="bg-[#f53003] dark:bg-[#ff5722] text-white px-6 py-3 rounded-full hover:bg-[#d92600] dark:hover:bg-[#e64a19] transition shadow-md dark:shadow-lg">
        Explore Now
    </a>
</section>




    <!-- Footer -->
    <footer class="container mx-auto px-6 py-8 text-center border-t mt-10">
        <p class="text-sm">&copy; {{ date('Y') }} TheBrightSide. All rights reserved.</p>
        <div class="mt-4 space-x-4">
            <a href="/privacy" class="text-sm hover:underline">Privacy Policy</a>
            <a href="/terms" class="text-sm hover:underline">Terms of Service</a>
        </div>
    </footer>

    
</body>
</html>
