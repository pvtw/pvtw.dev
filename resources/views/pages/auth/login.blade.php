<x-minimal-layout title="Login" description="This is the page where you can login to my website.">
    <div class="bg-primary w-full min-h-dvh flex flex-col md:justify-center items-center p-4">
        <a href="{{ route('home') }}" class="block w-32 h-32 outline-none focus-visible:ring focus-visible:ring-blue-500" wire:navigate>
            <img src="/images/logo-128x128.png" alt="Logo">
        </a>
        <div class="w-full max-w-lg bg-gray-100 dark:bg-gray-900 mt-1 p-4 rounded-xl shadow">
            <div class="border-b border-gray-500">
                <h1 class="text-3xl font-bold pb-4">Login</h1>
            </div>

            @if (session('status'))
                <div class="mt-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="mt-4">
                <form method="post" action="{{ route('auth.login.store') }}">
                    @csrf
                    
                    <div class="flex flex-col space-y-1">
                        <label for="form-email" class="font-bold">Email</label>
                        <input type="text" name="email" value="{{ old('email') }}" id="form-email" class="bg-white dark:bg-gray-800 outline-none focus-visible:ring focus-visible:ring-blue-500 px-2 py-1 border border-gray-300 dark:border-gray-700 rounded shadow" required autofocus autocomplete="username">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-1 mt-4">
                        <label for="form-password" class="font-bold">Password</label>
                        <input type="password" name="password" id="form-password" class="bg-white dark:bg-gray-800 outline-none focus-visible:ring focus-visible:ring-blue-500 px-2 py-1 border border-gray-300 dark:border-gray-700 rounded shadow" required autocomplete="current-password">
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end items-center mt-8">
                        <button type="submit" class="bg-primary dark:bg-gray-100 text-gray-100 dark:text-gray-900 outline-none focus-visible:ring focus-visible:ring-blue-500 font-bold px-4 py-2 rounded shadow">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-minimal-layout>