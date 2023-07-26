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
                    <!-- Comments Section -->
                    <h2 class="text-2xl font-semibold mb-4">Comments</h2>
                    @foreach ($blog->comments as $comment)
                    <div class="bg-gray-100 rounded p-4 mb-4">
                        <strong>{{ $comment->name }}</strong> said:
                        <p>{{ $comment->content }}</p>
                    </div>
                    @endforeach

                    <!-- Comment Form -->
                    <h2 class="text-2xl font-semibold mb-4">Leave a Comment</h2>
                    <form method="POST" action="{{ route('comments.store', $blog->id) }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold">Name:</label>
                            <input type="text" name="name" id="name" class="form-input mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-bold">Comment:</label>
                            <textarea name="content" id="content" class="form-textarea mt-1 block w-full" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>