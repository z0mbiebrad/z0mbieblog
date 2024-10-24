<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortDesc();
        $images = Image::all()->sortDesc();

        return view('posts.index', compact(['posts', 'images']));
    }

    public function create()
    {
        $images = Image::all();

        return view('posts.create', compact('images'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required',
        ]);
        
        Post::create([
            'markdown' => $validatedData['body'],
        ]);

        return redirect()->route('post.create')->with('success', 'Blog post created successfully!');
    }

    public function edit(Post $post, Image $image)
    {
        $images = $image::all();

        return view('posts.edit', compact(['post', 'images']));
    }
    
    public function update(Request $request, Post $post)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'body' => 'required|string',
        ]);

        // Update the post with the validated data
        $post->update([
            'markdown' => $validatedData['body'],
        ]);

        // Redirect back to the post edit page with a success message
        return redirect()->route('post.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->delete()) {
            return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->route('post.index')->with('error', 'Failed to delete post.');
        }

        return redirect()->route('post.index')->with('error', 'An error occurred while deleting the post.');
    }
}
