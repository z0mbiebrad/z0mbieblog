<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
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

    public function create()
    {
        $images = Image::all();

        return view('posts.create', compact('images'));
    }
}
