<?php

declare(strict_types=1);

use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('registration screen can be rendered', function (): void {
    $response = get('/register');

    $response->assertStatus(200);
});

test('new users can register', function (): void {
    $response = post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home', absolute: false));
});
