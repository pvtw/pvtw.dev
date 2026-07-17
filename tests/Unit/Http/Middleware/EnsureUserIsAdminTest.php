<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

test('abort when not logged in', function (): void {
    Route::middleware(['admin'])->get('_test', fn (): string => '');

    $response = get('_test');

    $response->assertStatus(403);
});

test('abort when user is not admin', function (): void {
    $user = User::factory()->create();
    Route::middleware(['admin'])->get('_test', fn (): string => '');

    $response = actingAs($user)->get('_test');

    $response->assertStatus(403);
});

test('return success response when user is admin', function (): void {
    $user = User::factory()->create();
    config(['admin.user_keys' => [$user->id]]);
    Route::middleware(['admin'])->get('_test', fn (): string => '');

    $response = actingAs($user)->get('_test');

    $response->assertStatus(200);
});
