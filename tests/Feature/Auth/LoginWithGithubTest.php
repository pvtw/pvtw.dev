<?php

declare(strict_types=1);

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;

use function Pest\Laravel\get;

test('guests are redirected', function (): void {
    Socialite::fake('github');

    $response = get('/auth/github/redirect');

    $response->assertRedirect();
});

test('guest is logged in when the github id exists', function (): void {
    User::factory()->create(['github_id' => 'github-123']);
    $socialiteUser = SocialiteUser::fake(['github_id' => 'github-123']);
    Socialite::fake('github', $socialiteUser);

    $response = get('/auth/github/callback');

    $this->assertAuthenticated();
    $response->assertRedirect(route('home'));
});

test('guest is logged in when the email exists', function (): void {
    User::factory()->create(['email' => 'patrick@pvtw.dev']);
    $socialiteUser = SocialiteUser::fake(['email' => 'patrick@pvtw.dev']);
    Socialite::fake('github', $socialiteUser);

    $response = get('/auth/github/callback');

    $this->assertAuthenticated();
    $response->assertRedirect(route('home'));
});

test('guest is logged in with a new account', function (): void {
    $socialiteUser = SocialiteUser::fake(['email' => 'patrick@pvtw.dev']);
    Socialite::fake('github', $socialiteUser);

    $response = get('/auth/github/callback');

    $this->assertAuthenticated();
    $response->assertRedirect(route('home'));
    $this->assertDatabaseHas('users', [
        'email' => 'patrick@pvtw.dev',
    ]);
});
