<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/list', [PageController::class, 'list']);
Route::post('/submit', [PageController::class, 'submit']);
Route::delete('/delete/{id}', [PageController::class, 'delete']);
Route::get('/edit/{id}', [PageController::class, 'edit']);
Route::post('/update/{id}', [PageController::class, 'update']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
//     return view('about');
// });