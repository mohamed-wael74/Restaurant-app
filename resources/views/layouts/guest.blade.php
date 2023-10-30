<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<div class=" bg-black shadow-md" x-data="{ isOpen: false }">
    <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
            <a class="text-xl font-semibold bg-clip-text text-white" href="#">
                BUFFALO BURGER
            </a>
            <!-- Mobile menu button -->
            <div @click="isOpen = !isOpen" class="flex md:hidden">
                <button type="button" class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                    aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd"
                            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <div :class="isOpen ? 'flex' : 'hidden'"
            class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
            <a class=" text-white font-semibold hover:bg-amber-600 rounded-md px-3 py-2 transition ease-out duration-300"
                href="{{ route('welcome.index') }}">Home</a>
            <a class=" text-white font-semibold hover:bg-amber-600 rounded-md px-3 py-2 transition ease-out duration-300"
                href="#about">About Us</a>
            <a class=" text-white font-semibold hover:bg-amber-600 rounded-md px-3 py-2 transition ease-out duration-300"
                href="{{ route('menus.index') }}">Menu</a>
            @guest
                <a class=" text-white font-semibold hover:bg-amber-600 rounded-md px-3 py-2 transition ease-out duration-300"
                    href="{{ route('register') }}">Register</a>
                <a class=" text-white font-semibold hover:bg-amber-600 rounded-md px-3 py-2 transition ease-out duration-300"
                    href="{{ route('login') }}">Login</a>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        class=" text-white font-semibold hover:bg-amber-600 rounded-md px-3 py-2 transition ease-out duration-300">
                        {{ __('Log Out') }}
                    </a>
                </form>
            @endguest
        </div>
    </nav>
</div>

<body class="font-sans text-gray-900 antialiased ">
    @yield('content')

    <footer class="bg-black border-t border-gray-200">
        <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between ">
            <div class="flex flex-wrap justify-center">
                <ul class="flex items-center space-x-4 text-white">
                    <li>
                        <a class=" text-white font-semibold hover:bg-amber-600 transition rounded-md px-3 py-2 ease-out duration-300"
                            href="{{ route('welcome.index') }}">Home</a>
                    </li>
                    <li>
                        @guest
                            <a class=" text-white font-semibold hover:bg-amber-600 rounded-md px-3 py-2 transition ease-out duration-300"
                                href="{{ route('register') }}">Register</a>
                            <a class=" text-white font-semibold hover:bg-amber-600 rounded-md px-3 py-2 transition ease-out duration-300"
                                href="{{ route('login') }}">Login</a>
                        @else
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class=" text-white font-semibold hover:bg-amber-600 rounded-md px-3 py-2 transition ease-out duration-300">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @endguest
                    </li>
                </ul>
            </div>
            <div class="flex justify-center ml-6 lg:mt-0">
                <a href="https://www.facebook.com/BuffaloBurger">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-6 h-6 text-blue-600" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-6" href="https://www.instagram.com/buffalo_burger/">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-6 h-6 text-pink-400" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
