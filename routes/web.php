<?php

use App\Http\Controllers\Posts;
use Illuminate\Support\Facades\Route;

Route::get( '/posts', [Posts:: class, 'index' ])->name('posts.index');
Route::get('/posts/create', [Posts::class, 'create']);
Route::get('/posts/{id}', [Posts::class, 'show'])->name('posts.show');
Route::post('/posts', [Posts::class, 'store']);
Route::get('/posts/{id}/edit', [Posts::class, 'edit']);
Route::put('/posts/{id}', [Posts::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [Posts::class, 'destroy'])->name('posts.destroy');


