<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;

final class PostTest extends TestCase
{
    public function test_posts_screen_can_be_rendered(): void
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    public function test_post_screen_can_be_rendered(): void
    {
        $post = Post::factory()->create();

        $response = $this->get(route('posts.show', ['post' => $post]));

        $response->assertStatus(200);
    }
}
