<x-app-layout title="{{ $post->meta_title }}" description="{{ $post->meta_description }}">
    <article>
        <header class="flex flex-col justfiy-center items-center bg-linear-to-b/srgb from-fuchsia-500 from-60% to-gray-100 dark:to-gray-900 via-green-500 via-80% px-4 py-16 lg:py-32">
            <h1 class="text-3xl lg:text-5xl text-white text-center font-bold">{{ $post->title }}</h1>
            <time datetime="{{ $post->published_at->format('Y-m-d') }}" class="text-lg lg:text-xl text-white text-center italic mt-2">{{ $post->published_at->format('F jS Y') }}</time>
        </header>
        <x-container class="mt-4">
            <x-markdown>{!! $post->content !!}</x-markdown>
        </x-container>
    </article>
</x-app-layout>