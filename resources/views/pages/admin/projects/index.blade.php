<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <div class="flex justify-between items-center border-b border-gray-500">
            <h1 class="text-3xl text-primary dark:text-white font-bold pb-4">My Projects (admin)</h1>
            @admin
                <x-link href="{{ route('admin.projects.create') }}">Create</x-link>
            @endadmin
        </div>
        <table class="w-full mt-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td class="flex justify-end items-center space-x-4">
                        <x-link href="{{ route('admin.projects.edit', $project) }}">Edit</x-link>
                        <form method="post" action="{{ route('admin.projects.destroy', $project) }}">
                            @method('delete')
                            @csrf
                            <button class="bg-red-500 text-white px-4 py-2 rounded shadow">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>