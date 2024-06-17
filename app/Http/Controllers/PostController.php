<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

final class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Cache::tags(['posts'])->rememberForever('posts.index', function () {
            return Post::query()
                ->whereNotNull('published_at')
                ->latest('published_at')
                ->get();
        });

        return view('pages.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('pages.posts.show', [
            'post' => $post,
        ]);
    }
}
