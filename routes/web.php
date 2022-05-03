<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Front\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware('basicauth')->group(function () {
        Route::get('login', [Admin\LoginController::class, 'create'])->name('login');
        Route::post('login', [Admin\LoginController::class, 'store']);
    });

    Route::middleware('auth:admin')->group(function () {
        Route::resource('articles', Admin\ArticleController::class);
        Route::resource('article-categories', Admin\ArticleCategoryController::class);
        Route::resource('tags', Admin\TagController::class);
    });
});

Route::middleware(['auth:web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::group(['middleware' => ['auth:web', 'verified']], function () {
    Route::view('/profile/edit', 'Front.profile.edit')->name('profile.edit');
    Route::get('logout', function () {
        Auth::logout();
        return redirect('register');
    });
});

// Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
//         Route::get('register', [AuthController::class, 'register'])->name('register');
//         Route::post('register', [AuthController::class, 'createUser'])->name('register');
//         Route::get('login', [AuthController::class, 'login'])->name('login');
//         Route::post('login', [AuthController::class, 'loginPost'])->name('login');
// });
