<x-app-layout title="{{ $post->meta_title }}" description="{{ $post->meta_description }}">
    <article>
        <header class="flex flex-col justfiy-center items-center bg-gradient-to-b from-fuchsia-500 from-60% to-black via-green-500 px-4 py-16 lg:py-32">
            <h1 class="text-3xl lg:text-5xl text-white text-center font-bold">{{ $post->title }}</h1>
            <span class="text-lg lg:text-xl text-white text-center mt-2">{{ $post->published_at->format('F jS Y') }}</span>
        </header>
        <x-container class="mt-4">
            <x-markdown>{!! $post->content !!}</x-markdown>
        </x-container>
    </article>
</x-app-layout>