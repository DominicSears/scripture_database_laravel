<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::controller(Controllers\UserController::class)->group(function () {
        Route::get('/users/edit/{user?}', 'edit')->name('users.edit');
    });
});
