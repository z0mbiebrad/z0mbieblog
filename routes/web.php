<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
    // Image Routes
    Route::post('/admin/upload-image', [ImageController::class, 'store'])->name('image.store');
    Route::delete('/admin/upload-image', [ImageController::class, 'destroy'])->name('image.destroy');

    // Post Routes
    Route::get('/admin/upload-post', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/upload-post', [PostController::class, 'store'])->name('post.store');
    Route::get('admin/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('admin/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});

require __DIR__.'/auth.php';
