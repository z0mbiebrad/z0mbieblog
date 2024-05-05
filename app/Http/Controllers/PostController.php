<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Parsedown;

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
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $parsedown = new Parsedown();
        $htmlContent = $parsedown->text($validatedData['body']);

        Post::create([
            'title' => $validatedData['title'],
            'body' => $htmlContent,
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
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $parsedown = new Parsedown();
        $htmlContent = $parsedown->text($validatedData['body']);

        // Update the post with the validated data
        $post->update([
            'title' => $validatedData['title'],
            'body' => $htmlContent,
        ]);

        // Redirect back to the post edit page with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->delete()) {
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->route('posts.index')->with('error', 'Failed to delete post.');
        }

        return redirect()->route('posts.index')->with('error', 'An error occurred while deleting the post.');
    }
}
