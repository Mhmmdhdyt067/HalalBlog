<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blogs', [BlogController::class, 'lists'])->name('lists');
Route::get('/blogs/{blogs:slug}', [BlogController::class, 'detail'])->name('detail');

Route::group(['middleware' => 'guest'], function () {
    // login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'auth']);

    // Register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::get('/table', [BlogController::class, 'table'])->name('table');
        Route::get('/recycle', [BlogController::class, 'recycle'])->name('recycle');
        Route::get('/blogs/slug-check', [BlogController::class, 'checkSlug']);
        Route::resource('/blogs', BlogController::class);
        Route::post('/blogs/restore/{blogs}', [BlogController::class, 'restore'])->name('restore');
        Route::post('/blogs/destroy/{blogs}', [BlogController::class, 'forceDelete'])->name('forceDelete');
        Route::get('/log', [BlogController::class, 'log'])->name('log');
    });
});

Route::get('/blogs/fetchAll', [BlogController::class, 'fetchALl'])->name('fetchAll');

Route::resource('/posts', PostController::class);

Route::get('/toast', function () {
    return view('toast');
});
