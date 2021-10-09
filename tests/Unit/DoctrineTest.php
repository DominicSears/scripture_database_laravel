<?php

use App\Models\Doctrine;

it('has factory that creates doctrine', function () {
   Doctrine::factory()->create();

   $this->assertCount(1, Doctrine::all());
});