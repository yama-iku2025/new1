<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SkillsheetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('post/create', [PostController::class, 'create'])->name('posts.create');
Route::post('post', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/skillsheets', [SkillsheetController::class, 'index'])->name('skillsheets.index');
Route::get('/skillsheets/create', [SkillsheetController::class, 'create'])->name('skillsheets.create');
Route::post('/skillsheets', [SkillsheetController::class, 'store'])->name('skillsheets.store');
