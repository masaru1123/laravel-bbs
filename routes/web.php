<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


// 掲示板一覧（誰でも見れる）
Route::get('/', [PageController::class, 'list']);

// 投稿（ログイン必須）
Route::post('/submit', [PageController::class, 'submit'])->middleware('auth');

Route::delete('/delete/{id}', [PageController::class, 'delete'])->middleware('auth');

Route::get('/edit/{id}', [PageController::class, 'edit'])->middleware('auth');
Route::post('/update/{id}', [PageController::class, 'update'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
