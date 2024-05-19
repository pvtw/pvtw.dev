<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <div class="border-b border-gray-500">
            <h1 class="text-3xl text-primary dark:text-white font-bold pb-4">My Projects</h1>
        </div>
        <div class="mt-4 space-y-8">
            @foreach($projects as $project)
                <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-xl">
                    @admin
                        <aside class="absolute top-0 right-0 flex justify-end items-center space-x-4">
                            <x-link href="{{ route('projects.edit', $project) }}">Edit</x-link>
                            <form method="post" action="{{ route('projects.destroy', $project) }}">
                                @method('delete')
                                @csrf
                                <button class="bg-red-500 text-white px-4 py-2 rounded shadow">Delete</button>
                            </form>
                        </aside>
                    @endadmin
                    <header class="flex flex-col p-4 border-b border-gray-500">
                        <h2 class="text-xl text-black dark:text-white font-bold">{{ $project->title }}</h2>
                        <span class="flex items-center space-x-2 text-sm italic mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                            <span>{{ $project->started_at->format('F jS Y') }} - {{ $project->finished_at?->format('F jS Y') ?? "Present" }}</span>
                        </span>
                        <span class="flex items-center space-x-2 mt-2">
                            <svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                <path d="m12 .5c-6.63 0-12 5.28-12 11.792 0 5.211 3.438 9.63 8.205 11.188.6.111.82-.254.82-.567 0-.28-.01-1.022-.015-2.005-3.338.711-4.042-1.582-4.042-1.582-.546-1.361-1.335-1.725-1.335-1.725-1.087-.731.084-.716.084-.716 1.205.082 1.838 1.215 1.838 1.215 1.07 1.803 2.809 1.282 3.495.981.108-.763.417-1.282.76-1.577-2.665-.295-5.466-1.309-5.466-5.827 0-1.287.465-2.339 1.235-3.164-.135-.298-.54-1.497.105-3.121 0 0 1.005-.316 3.3 1.209.96-.262 1.98-.392 3-.398 1.02.006 2.04.136 3 .398 2.28-1.525 3.285-1.209 3.285-1.209.645 1.624.24 2.823.12 3.121.765.825 1.23 1.877 1.23 3.164 0 4.53-2.805 5.527-5.475 5.817.42.354.81 1.077.81 2.182 0 1.578-.015 2.846-.015 3.229 0 .309.21.678.825.56 4.801-1.548 8.236-5.97 8.236-11.173 0-6.512-5.373-11.792-12-11.792z"
                                    fill="currentColor"></path>
                            </svg>
                            <x-link href="{{ $project->repository_url }}">{{ $project->repository_url }}</x-link>
                        </span>
                    </header>
                    <div class="p-4">
                        <p>{{ $project->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>