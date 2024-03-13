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
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Save post to the database
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->image_path = $imagePath;
        $post->save();

        return redirect()->route('posts.create')->with('success', 'Blog post created successfully!');
    }
}
