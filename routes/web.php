<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\{BrandController, CategoryController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello Laravel';
});

Route::get('/home', function () {
    return view('home', ['page'=>'Home page']);
});

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/about', function () {
    return 'Hello Laravel';
});


Route::get('/admin/brands', [BrandController::class, 'index']);

Route::get('/admin/brands/{id}', [BrandController::class, 'show']);

Route::resource('admin/categories', CategoryController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
