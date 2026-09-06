<?php

declare(strict_types=1);

use App\Models\User;

use function Pest\Laravel\actingAs;

test('settings screen can be rendered', function (): void {
    $user = User::factory()->create();

    $response = actingAs($user)->get('/settings');

    $response->assertStatus(200);
});
