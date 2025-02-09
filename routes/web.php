<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\BrandController;

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

