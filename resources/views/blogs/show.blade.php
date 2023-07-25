@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <p>{{ $blog->content }}</p>
        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
        </form>
    </div>
@endsection
