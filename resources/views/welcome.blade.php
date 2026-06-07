<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyPadi - Smart Paddy Disease Detection</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-white font-sans antialiased">
<!-- Hero Section -->
<section class="relative min-h-screen flex flex-col justify-center items-center text-center bg-gradient-to-b from-black via-gray-900 to-gray-950">
    <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-amber-400 drop-shadow-lg">
        MyPadi
    </h1>
    <p class="mt-6 text-lg md:text-xl text-gray-300 max-w-2xl">
        Detect paddy diseases with ease. Smart, accurate, and instant results for healthier crops.
    </p>
    <div class="mt-8 flex gap-4">
        <a href="{{ route('login') }}" class="px-6 py-3 bg-amber-500 hover:bg-amber-600 text-black font-semibold rounded-xl shadow-lg transition">
            Scan Now
        </a>

        <a href="https://sheikharifgit.github.io/sheikhpersonalportfolio.github.io/" target="_blank" class="px-6 py-3 bg-gray-800 hover:bg-gray-700 text-white font-semibold rounded-xl shadow-lg transition">
            Learn More About The Author
        </a>

    </div>
</section>

<!-- Featured Products / Features -->
<section class="py-16 bg-gray-900">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-amber-400">Our Features</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg hover:scale-105 transition">
{{--                <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Rice_fields_in_Malaysia.JPG" alt="Smart Detection" class="rounded-xl mb-4">--}}
                <h3 class="text-xl font-semibold">Smart Detection</h3>
                <p class="text-gray-400 mt-2">Identify paddy diseases instantly using AI-powered analysis.</p>
            </div>
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg hover:scale-105 transition">
{{--                <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Rice_farmer.jpg" alt="Treatment Guidance" class="rounded-xl mb-4">--}}
                <h3 class="text-xl font-semibold">Treatment Guidance</h3>
                <p class="text-gray-400 mt-2">Receive recommended actions to protect your crops and maximize yield.</p>
            </div>
            <div class="bg-gray-800 rounded-2xl p-6 shadow-lg hover:scale-105 transition">
{{--                <img src="https://upload.wikimedia.org/wikipedia/commons/1/11/Rice_field_automation.jpg" alt="History & Analytics" class="rounded-xl mb-4">--}}
                <h3 class="text-xl font-semibold">History & Analytics</h3>
                <p class="text-gray-400 mt-2">Track past scans and analyze disease trends for smarter farming.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-8 bg-black text-center text-gray-500">
    <p>&copy; {{ date('Y') }} MyPadi. All rights reserved.</p>
</footer>
</body>
</html>
