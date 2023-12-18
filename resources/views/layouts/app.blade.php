@props([
    "title" => "Patrick van 't Wout",
    "description" => "This is my mystical world of code and hacking.",
    "image" => config('app.url') . "/images/og-image.png"
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{!! $title !!} - Pvtw</title>

        <meta name="title" content="{!! $title !!}">
        <meta name="description" content="{!! $description !!}">

        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="{!! $title !!}">
        <meta property="og:description" content="{!! $description !!}">
        <meta property="og:image" content="{{ $image }}">

        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ config('app.url') }}">
        <meta property="twitter:title" content="{!! $title !!}">
        <meta property="twitter:description" content="{!! $description !!}">
        <meta property="twitter:image" content="{{ $image }}">

        <link rel="shortcut icon" href="/images/favicons/favicon.ico">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="64x64" href="/images/favicons/favicon-64x64.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
        <link rel="manifest" href="/images/favicons/site.webmanifest">
        
        <meta name="theme-color" content="#5c037f">
        <meta name="color-scheme" content="light dark">

        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="page" class="flex flex-col min-h-screen">
            <header class="bg-primary flex flex-col sm:flex-row items-start sm:items-center justify-between fixed top-0 w-full shadow z-[9001]"
                @keydown.window.escape="closeIfMobile"
                x-trap.inert.noscroll="window.innerWidth < 640 && open"
                x-data="{
                    open: window.innerWidth >= 640,
                    toggle() {
                        this.open = ! this.open
                    },
                    closeIfMobile() {
                        if (window.innerWidth < 640 && this.open) {
                            this.open = false
                        }
                    },
                }">
                <a href="#content" class="block absolute top-0 left-4 bg-orange-500 text-black underline font-bold px-4 py-2 rounded-b shadow transition-transform duration-200 -translate-y-16 focus-visible:translate-y-0">Skip to content</a>
                <div class="sm:w-auto w-full h-16 flex items-center justify-between px-2 text-white">
                    <a href="{{ route('home') }}" class="block text-3xl font-bold p-2">Pvtw</a>
                    
                    <button class="block sm:hidden p-2" @click.prevent="toggle" :aria-expanded="open" aria-controls="primary-navigation">
                        <span class="sr-only">Toggle menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8" aria-hidden="true" x-cloak x-show="! open">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8" aria-hidden="true" x-cloak x-show="open">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <nav id="primary-navigation" class="w-full sm:w-auto h-[calc(100vh-4rem)] sm:h-auto overflow-y-auto sm:overflow-y-visible sm:mr-2 p-2 sm:p-0" @click.away="closeIfMobile" x-cloak x-show="open">
                    <ul class="flex flex-col sm:flex-row sm:space-x-2 sm:space-y-0 space-y-2">
                        <li>
                            <a href="{{ route('about') }}" class="block text-white text-xl font-bold px-4 pt-2 pb-1 border-b-4 border-transparent hover:border-fuchsia-500 transition-colors duration-200">About Me</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <main id="content" class="bg-gray-100 flex-1 flex flex-col text-gray-900 dark:bg-gray-900 dark:text-gray-100">
                {{ $slot }}
            </main>
            <footer class="bg-black">
                <div class="p-4 text-white text-center">Copyright &copy; {{ now()->year }} - Patrick van 't Wout</div>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
