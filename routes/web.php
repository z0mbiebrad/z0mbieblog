<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Image;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'can:admin'])->group(function () {
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/upload-image', [ImageController::class, 'store'])->name('image.store');
    Route::delete('/admin/upload-image', [ImageController::class, 'destroy'])->name('image.destroy');
    Route::get('/admin/upload-post', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/upload-post', [PostController::class, 'store'])->name('post.store');
    Route::delete('/admin/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    // Add other admin routes as needed
});

require __DIR__.'/auth.php';
