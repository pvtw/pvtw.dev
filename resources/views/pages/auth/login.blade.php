<x-auth-layout title="Login" description="This is the page where you can login to my website.">
    @if (session('status'))
        <div class="mt-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('auth.github.redirect') }}" class="block w-full bg-white dark:bg-gray-800 text-center font-bold outline-none focus-visible:ring focus-visible:ring-blue-500 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded shadow">Login with GitHub</a>
    </div>

    <div class="mt-4 flex justify-center">
        <span class="text-lg text-gray-400 dark:text-gray-600 font-bold">OR</span>
    </div>
    
    <form method="post" action="{{ route('login') }}">
        @csrf
        
        <x-input-group>
            <x-label for="form-email">Email</x-label>
            <x-text-input type="text" name="email" value="{{ old('email') }}" id="form-email" required autofocus autocomplete="username" />
            @error('email')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <x-input-group class="relative mt-4">
            <x-label for="form-password">Password</x-label>
            <x-text-input type="password" name="password" id="form-password" required autocomplete="current-password" />
            <x-link href="{{ route('password.request') }}" class="absolute -top-1 right-0">Forgot Password?</x-link>
            @error('password')
                <x-error>{{ $message }}</x-error>
            @enderror
        </x-input-group>

        <div class="flex items-center gap-1 mt-4">
            <input type="checkbox" name="remember" id="form-remember">
            <label for="form-remember">Remember Me</label>
        </div>

        <x-submit-button>Submit</x-submit-button>
    </form>
</x-auth-layout>