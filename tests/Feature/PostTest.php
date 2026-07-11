<?php

declare(strict_types=1);

use App\Models\Post;

use function Pest\Laravel\get;

test('posts screen can be rendered', function (): void {
    $response = get('/posts');

    $response->assertStatus(200);
});

test('post screen can be rendered', function (): void {
    $post = Post::factory()->create();

    $response = get(route('posts.show', $post->slug));

    $response->assertStatus(200);
});
