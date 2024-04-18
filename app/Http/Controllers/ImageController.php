<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        ($request->hasFile('image'))
        ? $imagePath = $request->file('image')->store('images', 'public')
        : $imagePath = null; 


        if (!empty($imagePath)) {
            Image::create([
                'image_path' => $imagePath,
            ]);
        } else { 
            return redirect()->route('post.create')->with('error', 'Please upload an image first.');
        }


        return redirect(route('post.create'));
    }
}
