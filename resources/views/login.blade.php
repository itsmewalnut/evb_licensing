<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/evblogo.png') }}" type="image/x-icon" />
    <title>Licensing Monitoring System</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>

<body
    class="bg-[url('../../public/images/Background-cis.jpg')] bg-no-repeat bg-cover bg-center backdrop-blur-lg text-white flex items-center justify-center min-h-screen">
    <div class="p-6 w-110 h-105 flex flex-col items-center justify-center">
        <img src="{{ asset('images/homelogo.png') }}" alt="EVB Logo" class="w-70 mb-8">
        <form action="{{ route('login') }}" method="POST" class="w-full">
            @csrf
            <div class="mb-4">
                <flux:label class="mb-3 text-white">Email</flux:label>
                <flux:input class="bg-transparent" icon="envelope" type="email" name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="mt-1 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <flux:label class="mb-3 text-white">Password</flux:label>
                <flux:input icon="key" type="password" name="password" viewable />
                @error('password')
                    <p class="mt-1 text-xs">{{ $message }}</p>
                @enderror
                <a href="#" class="text-sm float-right my-3 mb-5">Forgot password?</a>
            </div>
            <flux:button type="submit" variant="ghost" class="w-full border-1 border-white py-5.5">
                <span class="text-white">LOGIN</span>
            </flux:button>
        </form>
    </div>
    @session('error')
    <div class="fixed z-50 flex items-center max-w-xs w-full bg-red-100 dark:bg-red-800 text-red-500 dark:text-red-200 px-6 py-4 rounded-lg shadow-lg font-semibold left-1/2 bottom-8 transform -translate-x-1/2 transition-opacity duration-500"
        x-data="{ show: true }" x-show="show" x-init="setTimeout(() => { show = false }, 3000)"
        x-transition:enter="transition-opacity duration-500" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-500"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" role="alert">
        <svg class="w-6 h-6 mr-3 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
        </svg>
        <span class="flex-1 text-left text-sm font-normal">{{ $value }}</span>
    </div>
    @endsession
    @session('success')
    <div class="fixed z-50 flex items-center max-w-xs w-full bg-green-100 dark:bg-green-800 text-green-500 dark:text-green-200 px-6 py-4 rounded-lg shadow-lg font-semibold left-1/2 bottom-8 transform -translate-x-1/2 transition-opacity duration-500"
        x-data="{ show: true }" x-show="show" x-init="setTimeout(() => { show = false }, 3000)"
        x-transition:enter="transition-opacity duration-500" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-500"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" role="alert">
        <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="flex-1 text-left text-sm font-normal">{{ $value }}</span>
    </div>
    @endsession('success')
    @fluxScripts
</body>

</html>
