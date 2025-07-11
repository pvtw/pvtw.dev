<x-auth-layout title="Confirm Password" description="This is the page where you can confirm your password.">
    <form method="post" action="{{ route('password.confirm') }}">
        @csrf
        
        <x-input-group>
            <x-label for="form-password">Current Password</x-label>
            <x-text-input type="password" name="password" id="form-password" required autofocus autocomplete="current-password" />
            @error('password')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-submit-button>Confirm</x-submit-button>
    </form>
</x-auth-layout>