<x-auth-layout title="Reset Password" description="This is the page where you can reset your password.">
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <input type="hidden" name="email" value="{{ old('email', $request->email) }}">
        @error('email')
            <x-error>{{ $message }}</x-error>
        @enderror
        
        <x-input-group class="mt-4">
            <x-label for="form-password">New Password</x-label>
            <x-text-input type="password" name="password" id="form-password" required autofocus autocomplete="new-password" />
            @error('password')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-input-group class="mt-4">
            <x-label for="form-password-confirmation">Confirm New Password</x-label>
            <x-text-input type="password" name="password_confirmation" id="form-password-confirmation" required autocomplete="new-password" />
            @error('password_confirmation')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-submit-button>Reset Password</x-submit-button>
    </form>
</x-auth-layout>