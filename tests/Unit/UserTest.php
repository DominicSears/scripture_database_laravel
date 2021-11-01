<?php

use App\Models\User;
use App\Models\Faith;
use App\Http\Resources\UserResource;

it('has a factory that can create users', function () {
    User::factory()->create();

    $this->assertCount(1, User::all());
});

it('it has json resource to print users', function () {
    User::factory()->count(5)->create();

    $userResource = UserResource::collection(User::all());

    expect($userResource)
        ->toBeInstanceOf(Illuminate\Http\Resources\Json\AnonymousResourceCollection::class)
        ->toHaveCount(5);
});

it('has a factory that can create relationships', function () {
    $user = User::factory()->create();

    Faith::factory()->create(['user_id' => $user->id]);

    $user->load('allFaiths');

    expect($user->allFaiths)->toHaveCount(2);
});