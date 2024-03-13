<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{   

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        // dd('test0');

        $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'body' => 'required',
        ]);
        // dd('test1');

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // dd('test2');

        $post->save();
        // dd('test3');
        // dd($post);

        return redirect()->route('posts.create')->with('success', 'Blog post created successfully!');
    }
}
