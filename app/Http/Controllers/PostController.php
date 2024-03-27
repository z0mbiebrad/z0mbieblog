<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Parsedown;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin']);
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $parsedown = new Parsedown();
        $htmlContent = $parsedown->text($request->input('body'));

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        Post::create([
            'title' => $validatedData['title'],
            'body' => $htmlContent,
            'image_path' => $imagePath,
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

    public function create(User $user)
    {

        return view('posts.create');
    }
}
