<?php

use App\Http\Controllers\API;
use Illuminate\Support\Facades\Route;

// All of models
Route::get('/denominations', [API\DenominationController::class, 'getDenominations']);
Route::get('/religions', [API\ReligionController::class, 'getReligions']);
Route::get('/posts', [API\PostController::class, 'getPosts']);
Route::get('/nuggets', [API\NuggetController::class, 'getNuggets']);

// User
Route::controller(API\UserController::class)->group(function () {
    Route::get('/users/{user}/', 'getUser');
    Route::get('/users/{user}/posts', 'getAllPosts');
    Route::get('/users/{user}/updatedPosts', 'getUpdatedByPosts');
    Route::get('/users/{user}/nuggets', 'getNuggets');
    Route::get('/users/{user}/nuggets/refutes', 'getRefuteNuggets');
    Route::get('/users/{user}/nuggets/support', 'getSupportNuggets');
    Route::get('/users/{user}/nuggets/general', 'getGeneralNuggets');
});

// Doctrine
Route::controller(API\DoctrineController::class)->group(function () {
    Route::get('/doctrines/{doctrine}/', 'getDoctrine');
    Route::get('/doctrines/{doctrine}/users', 'usersWithDoctrine');
    Route::get('/doctrines/{doctrine}/nuggets', 'getNuggets');
    Route::get('/doctrines/{doctrine}/nuggets/refutes', 'getRefuteNuggets');
    Route::get('/doctrines/{doctrine}/nuggets/support', 'getSupportNuggets');
    Route::get('/doctrines/{doctrine}/nuggets/general', 'getGeneralNuggets');
});

// Denomination
Route::controller(API\DenominationController::class)->group(function () {
    Route::get('/denominations/{denomination}/users', 'getUsers');
    Route::get('/denominations/{denomination}/users/current', 'getUsersWithCurrentFaith');
    Route::get('/denominations/{denomination}/doctrine', 'getDoctrine');
    Route::get('/denominations/{denomination}/nuggets', 'getAllNuggets');
    Route::get('/denominations/{denomination}/nuggets/refutes', 'getRefuteNuggets');
    Route::get('/denominations/{denomination}/nuggets/support', 'getSupportNuggets');
    Route::get('/denominations/{denomination}/nuggets/general', 'getGeneralNuggets');
});

// Religion
Route::controller(API\ReligionController::class)->group(function () {
    Route::get('/religions/{religion}/users', 'getUsers');
    Route::get('/religions/{religion}/users/current', 'getUsersWithCurrentFaith');
    Route::get('/religions/{religion}/doctrine', 'getDoctrine');
    Route::get('/religions/{religion}/denominations', 'getDenominations');
    Route::get('/religions/{religion}/nuggets', 'getAllNuggets');
    Route::get('/religions/{religion}/nuggets/refutes', 'getRefuteNuggets');
    Route::get('/religions/{religion}/nuggets/support', 'getSupportNuggets');
    Route::get('/religions/{religion}/nuggets/general', 'getGeneralNuggets');
});

// Posts
Route::group(['prefix' => '/posts'], function () {
    Route::get('/users', [API\PostController::class, 'getPostUsers']);
});

Route::group(['prefix' => '/posts/{username}/{slug}'], function () {
    Route::get('/', [API\PostController::class, 'getPost']);
});

// Nuggets
Route::group(['prefix' => '/nuggets'], function () {
    Route::get('/refutes', [API\NuggetController::class, 'getRefuteNuggets']);
});
