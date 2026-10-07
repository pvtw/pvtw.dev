<?php

declare(strict_types=1);

use App\Models\User;

use function Pest\Laravel\actingAs;

test('settings screen can be rendered', function (): void {
    $user = User::factory()->create();

    $response = actingAs($user)->get('/settings');

    $response->assertStatus(200);
});

test('load update-password component when user has a password', function (): void {
    $user = User::factory()->create();

    $response = actingAs($user)->get('/settings');

    $response->assertSeeLivewire('settings.update-password'); // @phpstan-ignore method.notFound
});

test('load set-password component when user password is null', function (): void {
    $user = User::factory()->create(['password' => null]);

    $response = actingAs($user)->get('/settings');

    $response->assertSeeLivewire('settings.set-password'); // @phpstan-ignore method.notFound
});
