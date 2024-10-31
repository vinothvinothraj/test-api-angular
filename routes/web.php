<?php


use Illuminate\Support\Facades\Route;
use App\Http\Livewire\LandingPage\Home;
use App\Http\Livewire\LandingPage\GetSinglePost;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Home::class)->name('home');
Route::get('/post', GetSinglePost::class)->name('post');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
