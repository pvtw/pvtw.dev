<x-app-layout title="My Posts" description="This is the page where you find my posts.">
    <x-container>
        <x-heading>My Posts</x-heading>
        <div class="mt-4 space-y-4">
            @foreach($posts as $post)
                <x-card>
                    <x-link href="{{ route('posts.show', $post) }}" class="block" wire:navigate>
                        <h2 class="text-lg lg:text-xl font-bold">{{ $post->title }}</h2>
                    </x-link>
                    <time datetime="{{ $post->published_at->format('Y-m-d') }}" class="text-sm italic mt-4">{{ $post->published_at->format('F jS Y') }}</time>
                </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>