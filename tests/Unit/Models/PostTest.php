<?php

declare(strict_types=1);

use App\Models\Post;

test('post has attributes', function (): void {
    $post = Post::factory()->create()->refresh();
    $keys = array_keys($post->toArray());

    expect($keys)->toBe([
        'id',
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ]);
});
