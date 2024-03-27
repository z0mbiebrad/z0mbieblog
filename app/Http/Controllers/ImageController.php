<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request, User $user)
    {
        $user = auth()->user();
        if (User::isAdmin()) {
            $validatedData = $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            ]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            } else {
                $imagePath = null;
            }

            Image::create([
                'image_path' => $imagePath,
            ]);
        }
    }
}
