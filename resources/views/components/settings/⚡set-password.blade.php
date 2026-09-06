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
    public string $password = '';

    public string $password_confirmation = '';

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'string', Password::default()],
            'password_confirmation' => ['required', 'string', Password::default()],
        ];
    }

    public function save(#[CurrentUser] User $user): void
    {
        $this->validate();

        if ($this->password !== $this->password_confirmation) {
            $this->reset();
            
            throw ValidationException::withMessages([
                'password' => 'The passwords do not match',
            ]);
        }

        $user->update([
            'password' => $this->password,
        ]);
        
        $this->redirectRoute('settings', navigate: true);
    }
};
?>

<x-card>
    <h2 class="text-lg text-black dark:text-white font-bold">Set A Password</h2>

    <p class="mt-4">
        You do not have a password yet. You can set a password here so you can login with your email address and newly created password.
    </p>

    <div class="mt-4">
        <form wire:submit="save">
            <x-input-group>
                <x-label for="form-password">Password</x-label>
                <x-text-input type="password" id="form-password" required autofocus autocomplete="new-password" passwordrules="{{ Password::default()->toPasswordRulesString() }}" wire:model="password" />
                @error('password')
                    <x-error>{{ $message }}</x-error>
                @enderror
            </x-input-group>

            <x-input-group class="mt-4">
                <x-label for="form-password-confirmation">Confirm Password</x-label>
                <x-text-input type="password" id="form-password-confirmation" required autocomplete="new-password" passwordrules="{{ Password::default()->toPasswordRulesString() }}" wire:model="password_confirmation" />
                @error('password_confirmation')
                    <x-error>{{ $message }}</x-error>
                @enderror
            </x-input-group>

            <x-submit-button>Set Password</x-submit-button>
        </form>
    </div>
</x-card>