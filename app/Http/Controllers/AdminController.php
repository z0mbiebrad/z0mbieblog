<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin']);
    }

    public function index()
    {
        // Display the admin page
        return view('admin.index');
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
                'body' => 'required',
            ]);
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

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

        return redirect()->route('admin.create')->with('success', 'Blog post created successfully!');
    }
}
