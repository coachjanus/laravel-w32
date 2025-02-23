<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\{BrandController, CategoryController, PostController, UserController};

use App\Livewire\Admin\Users\{UserTable, CreateUser, EditUser};
use App\Livewire\Admin\Posts\{PostTable, CreatePost, EditPost};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/about', function () {
    return 'Hello Laravel';
});


Route::get('/admin/brands', [BrandController::class, 'index']);

Route::get('/admin/brands/{id}', [BrandController::class, 'show']);

Route::prefix('admin')->group(function(){
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/categories/trashed', 'trashed')->name('admin.categories.trashed');
        Route::post('/categories/restore/{id}', 'restore')->name('admin.categories.restore');
        Route::delete('/categories/force/{id}', 'forceDelete')->name('admin.categories.force');
    });

    Route::controller(PostController::class)->group(function(){
        Route::get('/posts/trashed', 'trashed')->name('admin.posts.trashed');
        Route::post('/posts/restore/{id}', 'restore')->name('admin.posts.restore');
        Route::delete('/posts/force/{id}', 'forceDelete')->name('admin.posts.force');
    });
    
    Route::name('admin.')->group(function(){
        Route::resource('/categories', CategoryController::class);
        // Route::resource('/posts', PostController::class);  
        // Route::resource('/users', UserController::class);  
        Route::get('users', UserTable::class)->name('users.index');
        Route::get('users/create', CreateUser::class)->name('users.create');
        Route::get('users/{user}/edit', EditUser::class)->name('users.edit');

        Route::get('posts', PostTable::class)->name('posts.index');
        Route::get('posts/create', CreatePost::class)->name('posts.create');
        Route::get('posts/{post}/edit', EditPost::class)->name('posts.edit');
    });
});

Route::get('/order', function() {
    return new App\Mail\OrderShipped();
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
