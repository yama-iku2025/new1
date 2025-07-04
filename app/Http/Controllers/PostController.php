<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Post::create($validated);

        return redirect()->route('posts.create')->with('success', '投稿を保存しました！');
    }

    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }


}
