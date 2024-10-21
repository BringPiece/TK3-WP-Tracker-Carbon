<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('FE.home.index');  // Adjust the path to the actual view file
})->name('homes');


Route::controller(AuthController::class)
    ->prefix('auth')
    ->name('auth.')
    ->group(function () {
        Route::get('/signin', 'showSignInForm')->name('signin');
        Route::post('/signin', 'signIn');

        Route::get('/signup', 'showSignUpForm')->name('signup');
        Route::post('/signup', 'signUp');
        Route::get('/input', 'pageInputData')->name('input');
    });

Route::controller(PageController::class)
    ->prefix('page')
    ->name('page.')
    ->group(function () {
        Route::get('/input', 'pageInputData')->name('input');
    });

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
