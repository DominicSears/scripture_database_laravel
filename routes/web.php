<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Users
    Route::controller(Controllers\UserController::class)->group(function () {
        Route::get('/users/edit/{user?}/{faith_id?}', 'edit')->name('users.edit');
    });

    // Denominations
    Route::controller(Controllers\DenominationController::class)->group(function () {
        Route::get('/denominations/create', 'create')->name('denominations.create');
    });
});
