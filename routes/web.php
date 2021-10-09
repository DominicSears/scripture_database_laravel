<?php

use App\Models\Faith;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $user = User::factory()->create();

    $faiths = Faith::factory()->create();

    ddd(
        ['user' => $user, 'faiths' => $faiths]
    );
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
