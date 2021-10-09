<?php

use App\Models\Post;

it('has factory that can create posts', function () {
    Post::factory()->create();

    $this->assertCount(1, Post::all());
});