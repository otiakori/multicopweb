<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Blog management routes
    Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class);

    // Placeholder routes for future implementation
    Route::get('/categories', function () { return view('admin.categories.index'); })->name('categories.index');
    Route::get('/categories/create', function () { return view('admin.categories.create'); })->name('categories.create');
    Route::get('/tags', function () { return view('admin.tags.index'); })->name('tags.index');
    Route::get('/tags/create', function () { return view('admin.tags.create'); })->name('tags.create');
    Route::get('/users', function () { return view('admin.users.index'); })->name('users.index');
});

require __DIR__.'/auth.php';
