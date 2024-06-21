@props([
    "title",
    "description",
    "image" => config('app.url') . "/images/og-image.png",
    "fixed" => false,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth scroll-pt-16">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{!! $title !!} - {{ config('app.name') }}</title>

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
        @stack('head')
    </head>
    <body class="antialiased bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100"
        :class="{ dark: theme == 'system' ? window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches : theme == 'dark' }"
        x-data="{
            theme: undefined,
            init() {
                this.theme = window.localStorage.getItem('theme') || 'system'
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
                    this.theme = event.matches ? 'dark' : 'light';
                });
            },
            toggleTheme() {
                if(this.theme == 'light') {
                    this.theme = 'dark'
                } else if(this.theme == 'dark') {
                    this.theme = 'system'
                } else {
                    this.theme = 'light'
                }
                window.localStorage.setItem('theme', this.theme)
            }
        }">
        <div id="page" class="flex flex-col min-h-dvh">
            @php
                $header_position = $fixed ? "fixed" : "sticky";
            @endphp
            <header class="bg-primary text-white flex flex-col sm:flex-row items-start sm:items-center justify-between {{ $header_position }} top-0 w-full shadow z-[9001]"
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
                <a href="#content" class="block absolute top-0 left-4 bg-orange-500 text-black underline font-bold px-4 py-2 rounded-b shadow transition-transform duration-200 -translate-y-16 outline-none focus-visible:ring focus-visible:ring-blue-500 focus-visible:translate-y-0">Skip to content</a>
                <div class="w-full h-16 flex items-center justify-between px-2">
                    <a href="{{ route('home') }}" class="block text-3xl font-bold p-2 outline-none focus-visible:ring focus-visible:ring-blue-500" wire:navigate>Pvtw</a>
                    
                    <div class="flex justify-center items-center gap-2">
                        <button class="p-2 outline-none focus-visible:ring focus-visible:ring-blue-500" @click.prevent="toggleTheme">
                            <span class="sr-only">Toggle theme</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" aria-hidden="true" x-cloak x-show="theme == 'light'">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" aria-hidden="true" x-cloak x-show="theme == 'dark'">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" aria-hidden="true" x-cloak x-show="theme == 'system'">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <button class="block sm:hidden p-2 outline-none focus-visible:ring focus-visible:ring-blue-500" @click.prevent="toggle" :aria-expanded="open" aria-controls="primary-navigation">
                            <span class="sr-only">Toggle menu</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8" aria-hidden="true" x-cloak x-show="! open">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8" aria-hidden="true" x-cloak x-show="open">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <nav id="primary-navigation" class="w-full sm:w-auto h-[calc(100vh-4rem)] sm:h-auto overflow-y-auto sm:overflow-y-visible sm:mr-2 p-2 sm:p-0" @click.away="closeIfMobile" x-cloak x-show="open">
                    <ul class="flex flex-col sm:flex-row sm:space-x-2 sm:space-y-0 space-y-2">
                        <li>
                            <a
                                href="{{ route('posts.index') }}"
                                class="block [&[aria-current='page']]:text-fuchsia-500 text-xl text-nowrap font-bold px-4 pt-2 pb-1 border-b-4 border-transparent hover:border-fuchsia-500 transition-colors duration-200 outline-none focus-visible:ring focus-visible:ring-blue-500"
                                aria-current="{{ request()->is('posts') ? 'page' : 'false' }}"
                                wire:navigate>
                                Posts
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('projects.index') }}"
                                class="block [&[aria-current='page']]:text-fuchsia-500 text-xl text-nowrap font-bold px-4 pt-2 pb-1 border-b-4 border-transparent hover:border-fuchsia-500 transition-colors duration-200 outline-none focus-visible:ring focus-visible:ring-blue-500"
                                aria-current="{{ request()->is('projects') ? 'page' : 'false' }}"
                                wire:navigate>
                                Projects
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('about') }}"
                                class="block [&[aria-current='page']]:text-fuchsia-500 text-xl text-nowrap font-bold px-4 pt-2 pb-1 border-b-4 border-transparent hover:border-fuchsia-500 transition-colors duration-200 outline-none focus-visible:ring focus-visible:ring-blue-500"
                                aria-current="{{ request()->is('about-me') ? 'page' : 'false' }}"
                                wire:navigate>
                                About Me
                            </a>
                        </li>
                        @auth
                            <li>
                                <form method="post" action="{{ route('auth.logout') }}">
                                    @csrf

                                    <button type="submit" class="block w-full md:w-auto text-xl text-nowrap text-left font-bold px-4 pt-2 pb-1 border-b-4 border-transparent hover:border-fuchsia-500 transition-colors duration-200 outline-none focus-visible:ring focus-visible:ring-blue-500">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </header>
            <main id="content" class="flex-1">
                {{ $slot }}
            </main>
            <footer class="bg-gray-50 dark:bg-gray-950">
                <div class="max-w-md mx-auto p-4 text-sm text-center">
                    <p>
                        My website is <x-link href="https://github.com/pvtw/pvtw.dev">open source</x-link>.
                        Feel free to contribute if you find a bug or have suggestions to improve my website.
                    </p>
                    <p class="mt-2">Copyright &copy; {{ now()->year }} - Patrick van 't Wout</p>
                </div>
            </footer>
        </div>

        @livewireScripts
        @stack('scripts')
    </body>
</html>
