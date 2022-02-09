<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', [UserController::class, 'showLogin'])
        ->name('showLogin');

    Route::get('/create', [UserController::class, 'create'])
        ->name('create');

    Route::post('/register', [UserController::class, 'register'])
        ->name('register');

    Route::post('/login', [UserController::class, 'login'])
        ->name('login');
    });


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [UserController::class, 'myPage'])
        ->name('myPage');

    Route::post('/logout', [UserController::class, 'logout'])
        ->name('logout');

    Route::get('/post', [PostController::class, 'post'])
        ->name('posts.post');

    Route::get('/post/showCreate', [PostController::class, 'showCreate'])
        ->name('posts.showCreate');

    Route::post('/post/create', [PostController::class, 'create'])
        ->name('posts.create');

    Route::get('/post/{post}', [PostController::class, 'showPost'])
        ->name('posts.showPost');

    Route::get('/post/{post}/showEdit', [PostController::class, 'showEdit'])
        ->name('posts.showEdit');

    Route::patch('/post/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit');

    Route::delete('/post/{post}/destroy', [PostController::class, 'destroy'])
        ->name('posts.destroy');

    Route::get('/showSearch', [UserController::class, 'showSearch'])
        ->name('showSearch');

    Route::post('/search', [UserController::class, 'search'])
        ->name('search');
    });

