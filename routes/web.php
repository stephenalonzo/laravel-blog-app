<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
    get - request resource
    post - store resource
    put - edit resource (modify every single value in single row)
    patch - modify resource (only modifies values that have been changed)
    destroy - delete resource
    options - ask serve what verbs allowed
*/

Route::prefix('/blog')->group(function () {
// get
Route::get('/', [PostsController::class, 'index'])->name('blog.index');
Route::get('/{id}', [PostsController::class, 'show'])->name('blog.show');

// post
Route::get('/create', [PostsController::class, 'create'])->name('blog.create');
Route::post('/', [PostsController::class, 'store'])->name('blog.store');

// put or patch
Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('blog.edit');
Route::patch('/{id}', [PostsController::class, 'update'])->name('blog.update');

Route::delete('/{id}', [PostsController::class, 'destroy'])->name('blog.destroy');
});

// Route::resource('blog', PostsController::class);

// invoke
Route::get('/', HomeController::class);

Route::fallback(FallbackController::class);