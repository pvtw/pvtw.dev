<x-app-layout>
    <x-container>
        <x-heading>My Posts</x-heading>
        <div class="mt-4 space-y-4">
            @foreach($posts as $post)
                <x-card>
                    <x-link href="{{ route('posts.show', $post) }}">
                        <h2>{{ $post->title }}</h2>
                    </x-link>
                    <span class="text-sm italic mt-4">{{ $post->published_at->format('F jS Y') }}</span>
                </x-card>
            @endforeach
        </div>
    </x-container>
</x-app-layout>