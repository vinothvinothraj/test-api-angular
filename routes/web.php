<?php


use App\Http\Livewire\User\UserIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\UserCreate;
use App\Http\Livewire\User\UserUpdate;
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

Route::get('/admin/users', UserIndex::class)->name('admin.user.index');
Route::get('/admin/users/create', UserCreate::class)->name('admin.user.create');
Route::get('/admin/users/{id}/edit', UserUpdate::class)->name('admin.user.update');