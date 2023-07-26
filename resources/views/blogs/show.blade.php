<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-4">{{ $blog->title }}</h1>
                    <p class="mb-4">{{ $blog->content }}</p>
                    <div class="flex">
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 mr-2">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>