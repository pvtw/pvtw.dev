@props([
    "title",
    "description",
    "image" => config('app.url') . "/images/og-image.png",
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    </head>
    <body class="antialiased bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
        <div id="page">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
