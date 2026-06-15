<?php

declare(strict_types=1);

use App\Models\Post;

test('posts screen can be rendered', function (): void {
    $response = $this->get('/posts');

    $response->assertStatus(200);
});

test('post screen can be rendered', function (): void {
    $post = Post::factory()->create();

    $response = $this->get(route('posts.show', ['post' => $post]));

    $response->assertStatus(200);
});
