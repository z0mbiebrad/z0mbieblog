<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'images' => 'required',
        ]);

        if ($validatedData) {
            foreach ($validatedData['images'] as $image) {
                $imagePath = $image->store('images', 'public');
                Image::create([
                    'image_path' => $imagePath,
                ]);
            }
        } else {
            return redirect()->route('post.create')->with('error', 'Failed to upload one or more images.');
        }

        return redirect()->route('post.create')->with('success', 'Images uploaded successfully.');
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'selected_images' => 'required',
        ]);

        $selectedImages = $validatedData['selected_images'];

        if ($selectedImages) {
            foreach ($selectedImages as $imageId) {
                $image = Image::find($imageId);
                $image->delete();
            }
        } else {
            return redirect()->route('post.create')->with('error', 'Failed to upload one or more images.');
        }

        return redirect()->route('post.create')->with('success', 'Selected images deleted successfully.');
    }
}
