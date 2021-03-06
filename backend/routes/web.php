<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\TwitterLoginController;

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


Route::get('/', function () {
    return view('other.top');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/test', function () {
        return view('other.test');
    });
    Route::get('/load', function () {
        return view('other.loading');
    });
});
Auth::routes();
Route::get('/auth/redirect', [GoogleLoginController::class, 'getGoogleAuth']);
Route::get('/login/callback', [GoogleLoginController::class, 'authGoogleCallback']);
Route::get('/auth/login/twitter', [TwitterLoginController::class, 'redirectToProvider']);
Route::get('/auth/twitter/callback',[TwitterLoginController::class, 'handleProviderCallback']);

Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/store', [HomeController::class, 'store'])->name('store');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('/update', [HomeController::class, 'update'])->name('update');
Route::post('/destroy', [HomeController::class, 'destroy'])->name('destroy');
Route::get('/find', [HomeController::class, 'find'])->name('find');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/open', [CommentsController::class, 'index'])->name('comment-index');
Route::get('/open/{id}', [CommentsController::class, 'show'])->name('create');
Route::get('/open/{id}', [CommentsController::class, 'show'])->name('show');
Route::post('/open/store', [CommentsController::class, 'store'])->name('comment-store');
Route::post('/open/destroy', [CommentsController::class, 'destroy'])->name('comment-destroy');

