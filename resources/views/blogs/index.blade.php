<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mx-auto px-4 py-8">
                        <h1 class="text-3xl font-bold mb-4">All Blogs</h1>
                        <a href="{{ route('blogs.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4">Create New Blog</a>

                        @if(session('success'))
                        <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                        @endif

                        <table class="w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2">ID</th>
                                    <th class="border border-gray-300 px-4 py-2">Title</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $blog->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $blog->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <div class="flex">
                                            <a href="{{ route('blogs.show', $blog->id) }}" class="bg-pink-500 text-white px-2 py-1 rounded hover:bg-blue-600 mr-2">View</a>
                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 mr-2">Edit</a>
                                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>