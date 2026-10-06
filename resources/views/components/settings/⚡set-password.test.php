<?php

declare(strict_types=1);

use App\Models\User;
use Livewire\Livewire;

test('component renders successfully', function (): void {
    Livewire::test('settings.set-password')
        ->assertStatus(200);
});

test('password can be set', function (): void {
    $user = User::factory()->create(['password' => null]);

    Livewire::actingAs($user)
        ->test('settings.set-password')
        ->set('password', 'Password123!')
        ->set('password_confirmation', 'Password123!')
        ->assertSet('password', 'Password123!')
        ->assertSet('password_confirmation', 'Password123!')
        ->call('save')
        ->assertHasNoErrors()
        ->assertRedirectToRoute('settings');

    expect($user->refresh()->password)->not->toBeNull();
});

test('password must be at least 8 characters', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.set-password')
        ->set('password', 'a')
        ->set('password_confirmation', 'a')
        ->call('save')
        ->assertHasErrors([
            'password' => 'The password field must be at least 8 characters.',
            'password_confirmation' => 'The password confirmation field must be at least 8 characters.',
        ]);
});

test('password must not be greater than 100 characters', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.set-password')
        ->set('password', str_repeat('a', 101))
        ->set('password_confirmation', str_repeat('a', 101))
        ->call('save')
        ->assertHasErrors([
            'password' => 'The password field must not be greater than 100 characters.',
            'password_confirmation' => 'The password confirmation field must not be greater than 100 characters.',
        ]);
});

test('password must contain at least one uppercase and one lowercase letter', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.set-password')
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('save')
        ->assertHasErrors([
            'password' => 'The password field must contain at least one uppercase and one lowercase letter.',
            'password_confirmation' => 'The password confirmation field must contain at least one uppercase and one lowercase letter.',
        ]);
});

test('password must contain at least one symbol', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.set-password')
        ->set('password', 'Password')
        ->set('password_confirmation', 'Password')
        ->call('save')
        ->assertHasErrors([
            'password' => 'The password field must contain at least one symbol.',
            'password_confirmation' => 'The password confirmation field must contain at least one symbol.',
        ]);
});

test('password must contain at least one number', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.set-password')
        ->set('password', 'Password!')
        ->set('password_confirmation', 'Password!')
        ->call('save')
        ->assertHasErrors([
            'password' => 'The password field must contain at least one number.',
            'password_confirmation' => 'The password confirmation field must contain at least one number.',
        ]);
});

test('password and password confirmation must be equal', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.set-password')
        ->set('password', 'Password!1')
        ->set('password_confirmation', 'Password!2')
        ->call('save')
        ->assertHasErrors(['password' => 'The passwords do not match.']);
});
