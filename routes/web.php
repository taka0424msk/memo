<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

    });

Route::post('/register', [UserController::class, 'register'])
    ->name('register');

Route::post('/login', [UserController::class, 'login'])
    ->name('login');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [UserController::class, 'myPage'])
        ->name('myPage');
});

