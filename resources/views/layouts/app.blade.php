<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Voting</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@200&family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <livewire:styles />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans text-gray-900 text-sm bg-grey-background">
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="#" class="flex items-center justify-between">
            <svg class="h-10 w-10" viewBox="0 0 20 20" fill="rgba(75, 85, 99)">
                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
            </svg>
            <p class="uppercase text-lg font-semibold text-gray-600">for<span class="uppercase text-xl font-semibold text-blue">u</span>m</p>
        </a>
        <div class="flex items-center mt-2 md:mt-0">

            <!-- login links -->

            @if (Route::has('login'))
            <div class="px-6 py-4">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif

            <!-- avatar -->

            <a href="#">
                <img src="https://www.gravatar.com/avatar/0000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full" />
            </a>
        </div>
    </header>

    <main class="container mx-auto max-w-costum flex flex-col md:flex-row">
        <div class="w-70 mr-5 mx-auto md:mx-0 md:mr-5">
            <div class="border-2 border-blue rounded-xl mt-16 bg-white md:sticky md:top-8 ">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add an idea</h3>
                    <p class="text-xs mt-4">
                        @auth

                        Let us know what you would like and well take a look

                        @else

                        Please login to create an idea.

                        @endauth
                    </p>
                </div>
                @auth

                <livewire:create-idea />

                @else

                <div class="my-6 text-center">
                    <a href="{{ route('login') }}" class="inline-block justify-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-200 ease-in px-6 py-3 text-white">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in px-6 py-3 mt-2">
                        Sign up
                    </a>
                </div>

                @endauth
            </div>
        </div>
        <div class="w-full px-2 md:px-0 md:w-175">
            <nav class="hidden md:flex items-center justify-between text-xs">
                <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
                    <li><a href="#" class="border-b-4 pb-3 border-blue">All ideas (87)</a></li>
                    <li><a href="#" class="text-gray-400 transition duration-200 ease-in border-b-4 pb-3 hover:border-blue">Considering (9)</a></li>
                    <li><a href="#" class="text-gray-400 transition duration-200 ease-in border-b-4 pb-3 hover:border-blue">In Progress (9)</a></li>
                </ul>

                <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
                    <li><a href="#" class="text-gray-400 transition duration-200 ease-in border-b-4 pb-3 hover:border-blue">Implemented (10)</a></li>
                    <li><a href="#" class="text-gray-400 transition duration-200 ease-in border-b-4 pb-3 hover:border-blue">Closed (55)</a></li>
                </ul>
            </nav>

            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>
    <livewire:scripts />
</body>

</html>