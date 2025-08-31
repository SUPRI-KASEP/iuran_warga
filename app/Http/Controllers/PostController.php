<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $post = Post::all();
        return view('', compact(''));
    }

    public function create()
    {
        return view('Admin.createdata');
    }

    public function store(Request $request)
    {
        Post::create($request->validate([
            'title' => 'required',
            'content' => 'required',
        ]));

        return redirect()->route('');
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Update data
    public function update(Request $request, Post $post)
    {
        $post->update($request->validate([
            'title' => 'required',
            'content' => 'required',
        ]));

        return redirect()->route('posts.index');
    }

    // Hapus data
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
