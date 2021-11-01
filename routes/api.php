<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;

Route::get('/users/posts', [API\UserController::class, 'getPosts']);
