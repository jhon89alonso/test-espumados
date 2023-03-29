<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @routes
        {{-- @vite('resources/js/app.js') --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        <header class=" shadow-md">
            <nav>
                <div
                    class="flex   bg-gray-900 justify-between items-center text-gray-200 px-4 shadow-md sm:py-4 sm:justify-around">
                    <div class="sm:hidden text-2xl">&equiv;</div>
                    <ul class="hidden sm:flex justify-between w-64 text-gray-400">
                        <li>
                            <a href="http://">Inicio</a>
                        </li>
                        <li>
                            <a href="http://">Categorías de Roles</a>
                        </li>
                        <li>
                            <a href="http://">Usuarios registrados</a>
                        </li>
                    </ul>
                    <ul class="flex justify-between w-20">
                        <li>
                            <a href="http://">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="flex justify-between w-20">
                        <li>
                            <a href="http://">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                        <div class="  top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-50 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-50 underline">Login</a>
    
                                @if (Route::has('register'))
                                    {{-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-50 underline">Register</a> --}}
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </nav>
        </header>
        @inertia

        <div>
            
        </div>
    </body>
</html>
