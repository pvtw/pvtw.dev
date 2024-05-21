<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <div class="border-b border-gray-500">
            <h1 class="text-3xl text-primary dark:text-white font-bold pb-4">Dashboard</h1>
        </div>
        <div class="mt-4">
            <x-link href="{{ route('admin.projects.index') }}">
                <h2 class="text-xl font-bold">Projects</h2>
            </x-link>
        </div>
    </div>
</x-app-layout>