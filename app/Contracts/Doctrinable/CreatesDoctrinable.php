<?php

namespace App\Contracts\Doctrinable;

interface CreatesDoctrinable
{
    /**
     * Create a doctrinable
     *
     * @param array $data
     * @return void
     */
    public function __invoke(array $data): void;
}
