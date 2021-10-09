<?php

use App\Models\User;
use App\Models\Faith;

it('has a factory that can create users', function () {
    User::factory()->create();

    $this->assertCount(1, User::all());
});

it('has a factory that can create relationships', function () {
   $user = User::factory()
       ->has(Faith::factory()->count(2), 'allFaiths')
       ->create();

    dd($user);
});