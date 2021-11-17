<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::group(['prefix' => '/users'], function () {
        Route::get('/{user}/edit', [Controllers\UserController::class, 'edit'])->name('users.edit');
    });
});
