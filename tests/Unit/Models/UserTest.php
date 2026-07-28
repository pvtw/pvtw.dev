<?php

declare(strict_types=1);

use App\Models\User;
use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;

test('user has attributes', function (): void {
    $user = User::factory()->create()->refresh();
    $keys = array_keys($user->toArray());

    expect($keys)->toBe([
        'id',
        'name',
        'username',
        'email',
        'email_verified_at',
        'github_id',
        'avatar_url',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_admin',
    ]);
});

test('is_admin attribute', function (): void {
    $user = User::factory()->create();
    $admin = User::factory()->create();
    config(['admin.user_keys' => [$admin->getKey()]]);

    expect($user->is_admin)->toBe(false);
    expect($admin->is_admin)->toBe(true);
});

test('sends email verification notification', function (): void {
    $user = User::factory()->create();
    Notification::fake();

    $user->sendEmailVerificationNotification();

    Notification::assertSentTo($user, VerifyEmail::class);
});

test('sends reset password notification', function (): void {
    $user = User::factory()->create();
    Notification::fake();

    $user->sendPasswordResetNotification('token');

    Notification::assertSentTo($user, ResetPassword::class);
});
