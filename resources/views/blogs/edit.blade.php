@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Blog</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content', $blog->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
    </div>
@endsection
