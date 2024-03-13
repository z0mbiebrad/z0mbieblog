<?php

use App\Http\Controllers\AdminController;
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
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/upload-image', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/upload-image', [AdminController::class, 'store'])->name('admin.store');
    // Add other admin routes as needed
});
require __DIR__.'/auth.php';
