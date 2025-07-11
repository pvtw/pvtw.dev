<x-auth-layout title="Register" description="This is the page where you can register to my website.">
    <form method="post" action="{{ route('register') }}">
        @csrf
        
        <x-input-group>
            <x-label for="form-name">Name</x-label>
            <x-text-input type="text" name="name" value="{{ old('name') }}" id="form-name" required autofocus autocomplete="name" />
            @error('name')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-input-group class="mt-4">
            <x-label for="form-username">Username</x-label>
            <x-text-input type="text" name="username" value="{{ old('username') }}" id="form-username" autocomplete="username" />
            @error('username')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-input-group class="mt-4">
            <x-label for="form-email">Email</x-label>
            <x-text-input type="text" name="email" value="{{ old('email') }}" id="form-email" required autocomplete="email" />
            @error('email')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-input-group class="mt-4">
            <x-label for="form-password">Password</x-label>
            <x-text-input type="password" name="password" id="form-password" required autocomplete="new-password" />
            @error('password')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-input-group class="mt-4">
            <x-label for="form-password-confirmation">Confirm Password</x-label>
            <x-text-input type="password" name="password_confirmation" id="form-password-confirmation" required autocomplete="new-password" />
            @error('password_confirmation')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-submit-button>Create</x-submit-button>
    </form>
</x-auth-layout>