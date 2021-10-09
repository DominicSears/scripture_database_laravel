<?php

use App\Models\Faith;

it('has factory that can make faiths', function () {
    Faith::factory()->create();

    $this->assertCount(1, Faith::all());
});