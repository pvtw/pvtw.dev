<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Pvtw' }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="page" class="flex flex-col min-h-screen">
            <header class="bg-primary flex flex-col sm:flex-row items-start sm:items-center justify-between bg-opacity-95 fixed top-0 w-full shadow backdrop-blur-sm z-[9001]"
                x-data="{
                    open: window.innerWidth >= 640,
                    toggle() {
                        this.open = ! this.open
                    },
                }">
                <div class="sm:w-auto w-full h-16 flex items-center justify-between px-4 text-white">
                    <a href="{{ route('home') }}" class="text-3xl font-bold">Pvtw</a>
                    
                    <button class="block sm:hidden" @click.prevent="toggle" :aria-expanded="open">
                        <span class="sr-only">Open/Close menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8" aria-hidden="true" x-cloak x-show="! open">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8" aria-hidden="true" x-cloak x-show="open">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <nav class="sm:w-auto w-full sm:mr-4 sm:p-0 p-2" x-cloak x-show="open">
                    <ul class="flex flex-col sm:flex-row sm:space-x-2 sm:space-y-0 space-y-2">
                        <li>
                            <a href="{{ route('about') }}" class="py-2 px-5 hover:bg-gray-100 font-bold text-gray-100 hover:text-gray-900 text-lg hover:shadow-lg rounded-xl block transition duration-200">About Me</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <main class="flex-1 flex flex-col">
                {{ $slot }}
            </main>
            <footer class="bg-black">
                <div class="p-4 text-white text-center">Copyright &copy; {{ now()->year }} - Patrick van 't Wout</div>
            </footer>
        </div>
    </body>
</html>
