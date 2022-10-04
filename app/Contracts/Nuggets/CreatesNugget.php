<?php

namespace App\Contracts\Nuggets;

use Illuminate\Validation\ValidationException;

interface CreatesNugget
{
    /**
     * @param  array  $data
     * @return void
     *
     * @throws ValidationException
     */
    public function __invoke(array $data): void;
}
