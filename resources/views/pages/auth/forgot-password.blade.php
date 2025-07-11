<x-auth-layout title="Forgot Password" description="This is the page where you can request a new password.">
    <div class="mt-4 text-sm">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if (session('status'))
        <div class="mt-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action="{{ route('password.email') }}">
        @csrf
        
        <x-input-group class="mt-4">
            <x-label for="form-email">Email</x-label>
            <x-text-input type="text" name="email" value="{{ old('email') }}" id="form-email" required autofocus autocomplete="username" />
            @error('email')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-submit-button>Email Password Reset Link</x-submit-button>
    </form>
</x-auth-layout>