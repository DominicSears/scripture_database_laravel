<?php

namespace App\Contracts\Doctrine;

interface CreatesDoctrine
{
    /**
     * Creates a doctrine object along with doctrinable
     *
     * @param array $data
     * @return void
     */
    public function __invoke(array $data): void;
}
