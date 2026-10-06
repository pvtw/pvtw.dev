<?php

declare(strict_types=1);

use App\Models\User;
use Livewire\Livewire;

test('component renders successfully', function (): void {
    Livewire::test('settings.update-password')
        ->assertStatus(200);
});

test('password can be updated', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.update-password')
        ->set('current_password', 'password')
        ->set('new_password', 'Password123!')
        ->set('new_password_confirmation', 'Password123!')
        ->assertSet('current_password', 'password')
        ->assertSet('new_password', 'Password123!')
        ->assertSet('new_password_confirmation', 'Password123!')
        ->call('save')
        ->assertHasNoErrors()
        ->assertRedirectToRoute('settings');
});

test('current password must be correct', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.update-password')
        ->set('current_password', 'wrong-password')
        ->set('new_password', 'Password123!')
        ->set('new_password_confirmation', 'Password123!')
        ->call('save')
        ->assertHasErrors(['current_password' => 'The password is incorrect.']);
});

test('new password must be at least 8 characters', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.update-password')
        ->set('new_password', 'a')
        ->set('new_password_confirmation', 'a')
        ->call('save')
        ->assertHasErrors([
            'new_password' => 'The new password field must be at least 8 characters.',
            'new_password_confirmation' => 'The new password confirmation field must be at least 8 characters.',
        ]);
});

test('new password must not be greater than 100 characters', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.update-password')
        ->set('new_password', str_repeat('a', 101))
        ->set('new_password_confirmation', str_repeat('a', 101))
        ->call('save')
        ->assertHasErrors([
            'new_password' => 'The new password field must not be greater than 100 characters.',
            'new_password_confirmation' => 'The new password confirmation field must not be greater than 100 characters.',
        ]);
});

test('new password must contain at least one uppercase and one lowercase letter', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.update-password')
        ->set('new_password', 'password')
        ->set('new_password_confirmation', 'password')
        ->call('save')
        ->assertHasErrors([
            'new_password' => 'The new password field must contain at least one uppercase and one lowercase letter.',
            'new_password_confirmation' => 'The new password confirmation field must contain at least one uppercase and one lowercase letter.',
        ]);
});

test('new password must contain at least one symbol', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.update-password')
        ->set('new_password', 'Password')
        ->set('new_password_confirmation', 'Password')
        ->call('save')
        ->assertHasErrors([
            'new_password' => 'The new password field must contain at least one symbol.',
            'new_password_confirmation' => 'The new password confirmation field must contain at least one symbol.',
        ]);
});

test('new password must contain at least one number', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.update-password')
        ->set('new_password', 'Password!')
        ->set('new_password_confirmation', 'Password!')
        ->call('save')
        ->assertHasErrors([
            'new_password' => 'The new password field must contain at least one number.',
            'new_password_confirmation' => 'The new password confirmation field must contain at least one number.',
        ]);
});

test('new password and new password confirmation must be equal', function (): void {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test('settings.update-password')
        ->set('current_password', 'password')
        ->set('new_password', 'Password!1')
        ->set('new_password_confirmation', 'Password!2')
        ->call('save')
        ->assertHasErrors(['new_password' => 'The passwords do not match.']);
});
