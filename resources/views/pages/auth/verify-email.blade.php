<x-auth-layout title="Verify Email" description="This is the page where you can verify your email address.">
    <div class="mt-4 text-sm">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mt-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <form method="post" action="{{ route('verification.send') }}">
        @csrf
        
        <x-input-group>
            <x-label for="form-email">Email</x-label>
            <x-text-input type="text" name="email" value="{{ old('email') }}" id="form-email" required autofocus autocomplete="username" />
            @error('email')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-submit-button>Resend Verification Email</x-submit-button>
    </form>
</x-auth-layout>