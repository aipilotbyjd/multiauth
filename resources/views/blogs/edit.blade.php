<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-bold">Title:</label>
                            <input type="text" name="title" id="title" class="form-input mt-1 block w-full" value="{{ old('title', $blog->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-bold">Content:</label>
                            <textarea name="content" id="content" class="form-textarea mt-1 block w-full" rows="6" required>{{ old('content', $blog->content) }}</textarea>
                        </div>

                        <div class="flex">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2 hover:bg-blue-600">Update Blog</button>
                            <a href="{{ route('blogs.show', $blog->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>