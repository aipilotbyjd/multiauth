<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog->comments()->create([
            'name' => $request->name,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment submitted successfully!');
    }
}
