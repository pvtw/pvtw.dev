@props([
    "title",
    "description",
    "image" => config('app.url') . "/images/og-image.png",
])

<x-minimal-layout :$title :$description :$image>
    <div class="bg-primary w-full min-h-dvh flex flex-col md:justify-center items-center p-4">
        <a href="{{ route('home') }}" class="block w-32 h-32 outline-none focus-visible:ring focus-visible:ring-blue-500" wire:navigate>
            <img src="/images/logo-128x128.png" alt="Logo">
        </a>
        <div class="w-full max-w-lg bg-gray-100 dark:bg-gray-900 mt-1 p-4 rounded-xl shadow">
            <div class="border-b border-gray-500">
                <h1 class="text-3xl font-bold pb-4">{{ $title }}</h1>
            </div>

            <div class="mt-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-minimal-layout>