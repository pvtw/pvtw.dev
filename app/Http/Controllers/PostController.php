<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

final class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        /** @var Collection<int, Post> $posts */
        $posts = Cache::tags(['posts'])->rememberForever('posts.index', function (): Collection {
            return Post::query()
                ->where('published_at', '!=', null)
                ->latest('published_at')
                ->get();
        });

        return view('pages::posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug): View
    {
        $key = 'post.id.'.Str::slug($slug);

        $post = Cache::tags(['posts'])->rememberForever($key, function () use ($slug): Post {
            $post = Post::query()
                ->where('published_at', '!=', null)
                ->where('slug', $slug)
                ->first();

            throw_if( ! $post, ModelNotFoundException::class);

            return $post;
        });

        return view('pages::posts.show', [
            'post' => $post,
        ]);
    }
}
