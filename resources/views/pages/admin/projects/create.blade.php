<x-minimal-layout title="Create Project" description="This is the page where you can create a project.">
    <div class="bg-primary w-full min-h-screen flex flex-col justify-center items-center p-4">
        <a href="{{ route('home') }}" class="block w-32 h-32 outline-none focus-visible:ring focus-visible:ring-blue-500">
            <img src="/images/logo-128x128.png" alt="Logo">
        </a>
        <div class="w-full max-w-lg bg-gray-100 dark:bg-gray-900 mt-1 p-4 rounded-xl shadow">
            <div class="border-b border-gray-500">
                <h1 class="text-3xl font-bold pb-4">Create Project</h1>
            </div>
            <div class="mt-4">
                <form method="post" action="{{ route('admin.projects.store') }}">
                    @csrf
                    
                    <div class="flex flex-col space-y-1">
                        <label for="form-title" class="font-bold">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" id="form-title" class="bg-white dark:bg-gray-800 outline-none focus-visible:ring focus-visible:ring-blue-500 px-2 py-1 border border-gray-300 dark:border-gray-700 rounded shadow" required autofocus>
                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-1 mt-4">
                        <label for="form-description" class="font-bold">Description</label>
                        <textarea name="description" id="form-description" class="bg-white dark:bg-gray-800 outline-none focus-visible:ring focus-visible:ring-blue-500 px-2 py-1 border border-gray-300 dark:border-gray-700 rounded shadow" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-1 mt-4">
                        <label for="form-repository" class="font-bold">Repository URL</label>
                        <input type="text" name="repository_url" value="{{ old('repository_url') }}" id="form-repository" class="bg-white dark:bg-gray-800 outline-none focus-visible:ring focus-visible:ring-blue-500 px-2 py-1 border border-gray-300 dark:border-gray-700 rounded shadow" required>
                        @error('repository_url')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-1 mt-4">
                        <label for="form-started" class="font-bold">Started At</label>
                        <input type="date" name="started_at" value="{{ old('started_at') }}" id="form-started" class="bg-white dark:bg-gray-800 outline-none focus-visible:ring focus-visible:ring-blue-500 px-2 py-1 border border-gray-300 dark:border-gray-700 rounded shadow" required>
                        @error('started_at')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-1 mt-4">
                        <label for="form-finished" class="font-bold">Finished At</label>
                        <input type="date" name="finished_at" value="{{ old('finished_at') }}" id="form-finished" class="bg-white dark:bg-gray-800 outline-none focus-visible:ring focus-visible:ring-blue-500 px-2 py-1 border border-gray-300 dark:border-gray-700 rounded shadow">
                        @error('finished_at')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end items-center mt-8">
                        <button type="submit" class="bg-primary dark:bg-gray-100 text-gray-100 dark:text-gray-900 outline-none focus-visible:ring focus-visible:ring-blue-500 font-bold px-4 py-2 rounded shadow">Create</button>
                    </div>
                </form>
          </div>
        </div>
    </div>
</x-minimal-layout>