<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::group(['prefix' => '/users'], function () {
        Route::get('/edit/{user?}', [Controllers\UserController::class, 'edit'])->name('users.edit');
    });
});
