<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

final class LoginWithGitHubController
{
    public function create(): SymfonyRedirectResponse|RedirectResponse
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
        return DB::transaction(function () use ($githubUser): User {
            $userFromGithubId = User::query()
                ->where('github_id', $githubUser->getId())
                ->first();

            if (null !== $userFromGithubId) {
                return $userFromGithubId;
            }

            $userFromEmail = User::query()
                ->where('email', $githubUser->getEmail())
                ->first();

            if (null !== $userFromEmail) {
                $userFromEmail->update(['github_id' => $githubUser->getId()]);

                return $userFromEmail;
            }

            $attributes = [
                'name' => $githubUser->getName() ?? $githubUser->getNickname(),
                'email' => $githubUser->getEmail(),
                'github_id' => $githubUser->getId(),
                'avatar_url' => $githubUser->getAvatar(),
            ];

            $userFromUsername = User::query()
                ->where('username', $githubUser->getNickname())
                ->first();

            if (null === $userFromUsername) {
                $attributes = [
                    'username' => $githubUser->getNickname(),
                    ...$attributes,
                ];
            }

            return User::query()->create($attributes);
        });
    }
}
