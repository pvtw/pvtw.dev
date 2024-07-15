@props([
    'user',
    'id' => 'myAccountMenu-' . str()->random(),
])

<details id="{{ $id }}" class="relative" @click.away="document.getElementById('{{ $id }}').removeAttribute('open')">
    <summary class="cursor-pointer block w-12 h-12 flex justify-center items-center outline-none focus-visible:ring focus-visible:ring-blue-500">
        <span class="sr-only">My Account</span>
        @if(null !== $user->avatar_url)
            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}'s avatar" class="w-8 h-8 rounded-full">
        @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        @endif
    </summary>
    <ul class="absolute top-12 right-0 bg-gray-100 dark:bg-gray-900 text-black dark:text-white p-2 rounded shadow">
        <li>
            <form method="post" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="block w-auto text-xl text-nowrap text-left font-bold px-4 pt-2 pb-1 border-b-4 border-transparent hover:border-fuchsia-500 transition-colors duration-200 outline-none focus-visible:ring focus-visible:ring-blue-500">Logout</button>
            </form>
        </li>
    </ul>
</details>