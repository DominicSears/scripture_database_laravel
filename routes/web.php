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

    // Religion
    Route::controller(Controllers\ReligionController::class)->group(function () {
        Route::get('/religions', 'list')->name('religions.list');
        Route::get('/religions/create', 'create')->name('religions.create');
        Route::get('/religions/{religion}/denominations/create', 'createDenomination')->name('religions.create-denomination');
        Route::get('/religions/{religion}/denominations/edit/{denomination}', 'editDenomination')->name('religions.edit-denomination');
        Route::get('/religions/{religion}/denominations', 'denominations')->name('religions.denominations');
    });

    // Denomination
    Route::controller(Controllers\DenominationController::class)->group(function() {
        Route::get('/denominations/create', 'createDenomination')->name('denominations.create');
    });

    // Doctrine
    Route::controller(Controllers\DoctrineController::class)->group(function () {
        Route::get('/doctrines', 'list')->name('doctrines.list');
        Route::get('/doctrines/create', 'create')->name('doctrines.create');
    });

    // Nuggets
    Route::controller(Controllers\NuggetController::class)->group(function () {
        Route::get('/nuggets', 'list')->name('nuggets.list');
    });
});
