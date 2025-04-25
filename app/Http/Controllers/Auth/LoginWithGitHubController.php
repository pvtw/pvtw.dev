<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialiteUser;
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

        $user = $this->getUserFromGithubUser($githubUser);

        Auth::login($user, true);

        return redirect()->route('home');
    }

    private function getUserFromGithubUser(SocialiteUser $githubUser): User
    {
        /** @var User|null $user */
        $user = User::where('github_id', $githubUser->getId())->first();

        if (null !== $user) {
            return $user;
        }

        /** @var User|null $user */
        $user = User::where('email', $githubUser->getEmail())->first();

        if (null !== $user) {
            $user->update(['github_id', $githubUser->getId()]);

            return $user;
        }

        $attributes = [
            'name' => $githubUser->getName() ?? $githubUser->getNickname(),
            'email' => $githubUser->getEmail(),
            'github_id' => $githubUser->getId(),
            'avatar_url' => $githubUser->getAvatar(),
        ];

        if (0 === User::where('username', $githubUser->getNickname())->count()) {
            $attributes = [
                'username' => $githubUser->getNickname(),
                ...$attributes,
            ];
        }

        return User::create($attributes);
    }
}
