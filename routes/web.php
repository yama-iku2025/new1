<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('post/create', [PostController::class, 'create'])->name('posts.create');
Route::post('post', [PostController::class, 'store'])->name('posts.store');
