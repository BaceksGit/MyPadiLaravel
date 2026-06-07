<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyPadi - Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-950 text-white font-sans antialiased">

<!-- Main Section -->
<section class="relative min-h-screen flex flex-col justify-center items-center text-center bg-gradient-to-b from-black via-gray-900 to-gray-950 px-6">
    <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-amber-400 drop-shadow-lg mb-2">
        MyPadi
    </h1>
    <p class="text-gray-300 mb-8 text-lg md:text-xl">
        Smart Paddy Disease Detection System
    </p>

    <!-- Login Card -->
    <div class="bg-gray-900 p-8 rounded-2xl shadow-2xl w-full max-w-md text-left">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full bg-gray-800 border-gray-700 text-white"
                              type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full bg-gray-800 border-gray-700 text-white"
                              type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-600 text-amber-500 shadow-sm focus:ring-amber-400" name="remember">
                    <span class="ml-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-between mt-6">
                <div class="flex flex-col space-y-2 text-sm">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="underline text-gray-400 hover:text-amber-400 transition">
                            {{ __('Register') }}
                        </a>
                    @endif

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="underline text-gray-400 hover:text-amber-400 transition">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <x-primary-button class="bg-amber-500 hover:bg-amber-600 text-black font-semibold rounded-xl shadow-lg transition px-6 py-2">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- Back to Homepage -->
    <div class="mt-8">
        <a href="{{ url('/') }}" class="text-gray-400 hover:text-amber-400 transition text-sm underline">
            ← Back to Home
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="py-6 bg-black text-center text-gray-500 text-sm">
    <p>&copy; {{ date('Y') }} MyPadi. All rights reserved.</p>
</footer>

</body>
</html>
