<?php

declare(strict_types=1);

use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

use function Pest\Laravel\actingAs;

test('email verification screen can be rendered', function (): void {
    $user = User::factory()->unverified()->create();

    $response = actingAs($user)->get('/email/verify');

    $response->assertStatus(200);
});

test('email verification can be requested', function (): void {
    $user = User::factory()->unverified()->create();
    Notification::fake();

    $response = actingAs($user)->post('/email/verify');

    Notification::assertSentTo($user, VerifyEmail::class);
    $response->assertRedirectBack();
    $response->assertSessionHas('status');
});

test('email can be verified', function (): void {
    $user = User::factory()->unverified()->create();

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1((string) $user->email)]
    );

    $response = actingAs($user)->get($verificationUrl);

    Event::assertDispatched(Verified::class);
    expect($user->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect(route('home', absolute: false).'?verified=1');
});

test('email is not verified with invalid hash', function (): void {
    $user = User::factory()->unverified()->create();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    actingAs($user)->get($verificationUrl);

    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
});

test('user is redirected to home when email is already verified', function (): void {
    $user = User::factory()->create();
    Event::fake();
    Notification::fake();

    $response = actingAs($user)->get('/email/verify');

    $response->assertRedirect(route('home', absolute: false));

    $response = actingAs($user)->post('/email/verify');

    $response->assertRedirect(route('home', absolute: false));

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1((string) $user->email)]
    );

    $response = actingAs($user)->get($verificationUrl);

    $response->assertRedirect(route('home', absolute: false).'?verified=1');
});
