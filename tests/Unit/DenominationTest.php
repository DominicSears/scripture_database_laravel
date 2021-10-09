<?php

use App\Models\Denomination;

it('has factory that can create denominations', function () {
   Denomination::factory()->create();

   $this->assertCount(1, Denomination::all());
});