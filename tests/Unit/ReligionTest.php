<?php

use App\Models\Religion;

it('has factory that can create religions', function () {
    Religion::factory()->create();

    $this->assertCount(1, Religion::all());
});