<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

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
        
        Route::post('/signout', 'signOut')->name('signout');
    });