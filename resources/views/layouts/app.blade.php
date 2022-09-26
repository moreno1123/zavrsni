<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="/site.webmanifest">

    <title>Voting</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <livewire:styles />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans bg-gray-background text-gray-900 text-sm">
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="/" class="flex items-center justify-between">
            <svg class="h-10 w-10" viewBox="0 0 20 20" fill="rgba(75, 85, 99)">
                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
            </svg>
            <p class="uppercase text-lg font-semibold text-gray-600">for<span class="uppercase text-xl font-semibold text-blue">u</span>m</p>
        </a>
        <div class="flex items-center mt-2 md:mt-0">
            @if (Route::has('login'))
            <div class="px-6 py-4">
                @auth
                <div class="flex items-center space-x-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            {{ __('Log out') }}
                        </a>
                    </form>
                </div>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
            @auth
            <a href="{{ route('user') }}">
                <img src="{{ auth()->user()->avatar() }}" alt="avatar" class="w-10 h-10 rounded-full">
            </a>
            @endauth
        </div>
    </header>

    <main class="container mx-auto max-w-custom flex flex-col md:flex-row">
        <div class="w-70 mx-auto md:mx-0 md:mr-5">
            <div class="border-2 border-blue rounded-xl mt-16 bg-white md:sticky md:top-8 w-full">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Dodaj ideju</h3>
                    <p class="text-xs mt-4">
                        @auth
                        Podijeli sa svima o čemu razmišljaš.
                        @else
                        Prijavi se za kreiranje ideje.
                        @endauth
                    </p>
                    @if (session('success_message'))
                    <div x-data="{ isVisible: true }" x-init="setTimeout(() => {isVisible = false}, 5000)" x-show="isVisible" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-8" class="text-green mt-4 font-bold text-base">
                        {{ session('success_message') }}
                    </div>
                    @endif
                    @if (session('delete_message'))
                    <div x-data="{ isVisible: true }" x-init="setTimeout(() => {isVisible = false}, 5000)" x-show="isVisible" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-8" x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-x-0" x-transition:leave-end="opacity-0 transform translate-x-8" class="text-red mt-4 font-bold text-base">
                        {{ session('delete_message') }}
                    </div>
                    @endif
                </div>

                <livewire:create-idea />
            </div>
        </div>
        <div class="w-full px-2 md:px-0 md:w-175">

            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>

    <livewire:scripts />
</body>

</html>