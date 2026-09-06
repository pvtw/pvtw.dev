<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

new class () extends Component
{
    public string $current_password = '';

    public string $new_password = '';

    public string $new_password_confirmation = '';

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', 'current_password'],
            'new_password' => ['required', 'string', Password::default()],
            'new_password_confirmation' => ['required', 'string', Password::default()],
        ];
    }

    public function save(#[CurrentUser] User $user): void
    {
        $this->validate();

        if ($this->new_password !== $this->new_password_confirmation) {
            $this->reset();
            
            throw ValidationException::withMessages([
                'new_password' => 'The passwords do not match',
            ]);
        }

        $user->update([
            'password' => $this->new_password,
        ]);
        
        $this->redirectRoute('settings', navigate: true);
    }
};
?>

<x-card>
    <h2 class="text-lg text-black dark:text-white font-bold">Update Your Password</h2>

    <div class="mt-4">
        <form wire:submit="save">
            <x-input-group>
                <x-label for="form-current-password">Current Password</x-label>
                <x-text-input type="password" id="form-current-password" required autofocus autocomplete="current-password" wire:model="current_password" />
                @error('current_password')
                    <x-error>{{ $message }}</x-error>
                @enderror
            </x-input-group>

            <x-input-group class="mt-4">
                <x-label for="form-new-password">New Password</x-label>
                <x-text-input type="password" id="form-new-password" required autocomplete="new-password" passwordrules="{{ Password::default()->toPasswordRulesString() }}" wire:model="new_password" />
                @error('new_password')
                    <x-error>{{ $message }}</x-error>
                @enderror
            </x-input-group>

            <x-input-group class="mt-4">
                <x-label for="form-new-password-confirmation">Confirm New Password</x-label>
                <x-text-input type="password" id="form-new-password-confirmation" required autocomplete="new-password" passwordrules="{{ Password::default()->toPasswordRulesString() }}" wire:model="new_password_confirmation" />
                @error('new_password_confirmation')
                    <x-error>{{ $message }}</x-error>
                @enderror
            </x-input-group>

            <x-submit-button>Update</x-submit-button>
        </form>
    </div>
</x-card>