<?php

use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Main\IndexController as MainIndexController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Main'], function () {

    Route::get('/', [IndexController::class, 'index']);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [MainIndexController::class, 'index']);
    });
    Route::group(['namespace' => 'Post', 'prefix'=>'posts'], function () {
        Route::get('/', [PostIndexController::class, 'index'])->name('post.index');
        Route::get('/create', [PostIndexController::class, 'create'])->name('post.create');
        Route::post('/store', [PostIndexController::class, 'store'])->name('post.store');
        Route::get('/{post}', [PostIndexController::class, 'show'])->name('post.show');
        Route::get('/{post}/edit', [PostIndexController::class, 'edit'])->name('post.edit');
        Route::put('/{post}', [PostIndexController::class, 'update'])->name('post.update');
        Route::delete('/{post}', [PostIndexController::class, 'delete'])->name('post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix'=>'categories'], function () {
        Route::get('/', [CategoryIndexController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryIndexController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryIndexController::class, 'store'])->name('category.store');
        Route::get('/{category}', [CategoryIndexController::class, 'show'])->name('category.show');
        Route::get('/{category}/edit', [CategoryIndexController::class, 'edit'])->name('category.edit');
        Route::put('/{category}', [CategoryIndexController::class, 'update'])->name('category.update');
        Route::delete('/{category}', [CategoryIndexController::class, 'delete'])->name('category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix'=>'tags'], function () {
        Route::get('/', [TagIndexController::class, 'index'])->name('tag.index');
        Route::get('/create', [TagIndexController::class, 'create'])->name('tag.create');
        Route::post('/store', [TagIndexController::class, 'store'])->name('tag.store');
        Route::get('/{tag}', [TagIndexController::class, 'show'])->name('tag.show');
        Route::get('/{tag}/edit', [TagIndexController::class, 'edit'])->name('tag.edit');
        Route::put('/{tag}', [TagIndexController::class, 'update'])->name('tag.update');
        Route::delete('/{tag}', [TagIndexController::class, 'delete'])->name('tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix'=>'users'], function () {
        Route::get('/', [UserIndexController::class, 'index'])->name('user.index');
        Route::get('/create', [UserIndexController::class, 'create'])->name('user.create');
        Route::post('/store', [UserIndexController::class, 'store'])->name('user.store');
        Route::get('/{user}', [UserIndexController::class, 'show'])->name('user.show');
        Route::get('/{user}/edit', [UserIndexController::class, 'edit'])->name('user.edit');
        Route::put('/{user}', [UserIndexController::class, 'update'])->name('user.update');
        Route::delete('/{user}', [UserIndexController::class, 'delete'])->name('user.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
