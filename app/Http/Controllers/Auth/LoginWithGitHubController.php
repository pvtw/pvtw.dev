<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

final class LoginWithGitHubController extends Controller
{
    public function create(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function store(): RedirectResponse
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            'github_id' => $githubUser->getId(),
        ], [
            'name' => $githubUser->getName(),
            'username' => $githubUser->getNickname(),
            'email' => $githubUser->getEmail(),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
