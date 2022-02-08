<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;

// All of models
Route::get('/denominations', [API\DenominationController::class, 'getDenominations']);
Route::get('/religions', [API\ReligionController::class, 'getReligions']);
Route::get('/posts', [API\PostController::class, 'getPosts']);
Route::get('/nuggets', [API\NuggetController::class, 'getNuggets']);

// User
Route::group(['prefix' => '/users/{user}'], function () {
    Route::get('/', [API\UserController::class, 'getUser']);
    Route::get('/posts', [API\UserController::class, 'getAllPosts']);
    Route::get('/updatedPosts', [API\UserController::class, 'getUpdatedByPosts']);
    Route::get('/nuggets', [API\UserController::class, 'getNuggets']);
    Route::get('/nuggets/refutes', [API\UserController::class, 'getRefuteNuggets']);
    Route::get('/nuggets/support', [API\UserController::class, 'getSupportNuggets']);
    Route::get('/nuggets/general', [API\UserController::class, 'getGeneralNuggets']);
});

// Doctrine
Route::group(['prefix' => '/doctrines/{doctrine}'], function () {
    Route::get('/', [API\DoctrineController::class, 'getDoctrine']);
    Route::get('/users', [API\DoctrineController::class, 'usersWithDoctrine']);
    Route::get('/nuggets', [API\DoctrineController::class, 'getNuggets']);
    Route::get('/nuggets/refutes', [API\DoctrineController::class, 'getRefuteNuggets']);
    Route::get('/nuggets/support', [API\DoctrineController::class, 'getSupportNuggets']);
    Route::get('/nuggets/general', [API\DoctrineController::class, 'getGeneralNuggets']);
});

// Denomination
Route::group(['prefix' => '/denominations/{denomination}'], function () {
    Route::get('/users', [API\DenominationController::class, 'getUsers']);
    Route::get('/users/current', [API\DenominationController::class, 'getUsersWithCurrentFaith']);
    Route::get('/doctrine', [API\DenominationController::class, 'getDoctrine']);
    Route::get('/nuggets', [API\DenominationController::class, 'getAllNuggets']);
    Route::get('/nuggets/refutes', [API\DenominationController::class, 'getRefuteNuggets']);
    Route::get('/nuggets/support', [API\DenominationController::class, 'getSupportNuggets']);
    Route::get('/nuggets/general', [API\DenominationController::class, 'getGeneralNuggets']);
});

// Religion
Route::group(['prefix' => '/religions/{religion}'], function () {
    Route::get('/users', [API\ReligionController::class, 'getUsers']);
    Route::get('/users/current', [API\ReligionController::class, 'getUsersWithCurrentFaith']);
    Route::get('/doctrine', [API\ReligionController::class, 'getDoctrine']);
    Route::get('/denominations', [API\ReligionController::class, 'getDenominations']);
    Route::get('/nuggets', [API\ReligionController::class, 'getAllNuggets']);
    Route::get('/nuggets/refutes', [API\ReligionController::class, 'getRefuteNuggets']);
    Route::get('/nuggets/support', [API\ReligionController::class, 'getSupportNuggets']);
    Route::get('/nuggets/general', [API\ReligionController::class, 'getGeneralNuggets']);
});

// Posts
Route::group(['prefix' => '/posts'], function () {
    Route::get('/users', [API\ReligionController::class, 'getPostUsers']);
});

Route::group(['prefix' => '/posts/{username}/{slug}'], function () {
    Route::get('/', [API\PostController::class, 'getPost']);
});

// Nuggets
Route::group(['prefix' => '/nuggets'], function () {
    Route::get('/refutes', [API\NuggetController::class, 'getRefuteNuggets']);
});
