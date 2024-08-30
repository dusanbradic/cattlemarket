<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    return view('/welcome');
});

// Route::resource('posts', PostController::class);
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Show the form for creating a new post (create)
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Store a newly created post (store)
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Show a specific post (show)
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Show the form for editing a specific post (edit)
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Update a specific post (update)
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Delete a specific post (destroy)
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/dashboard', function () {
    $posts = Post::all();
    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/posts/create', [PostController::class, 'posts.create'])->name('posts.create');
    // Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

require __DIR__.'/auth.php';