<?php

namespace App\Contracts\Nuggets;
use Illuminate\Validation\ValidationException;

interface CreatesNugget
{
    /**
     * @param array $data
     * @throws ValidationException
     * @return void
     */
    public function __invoke(array $data): void;
}
