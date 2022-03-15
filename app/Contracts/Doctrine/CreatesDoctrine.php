<?php

namespace App\Contracts\Doctrine;

use App\Models\Doctrine;

interface CreatesDoctrine
{
    /**
     * Creates a doctrine object along with doctrinable
     *
     * @param array $data
     * @return Doctrine
     */
    public function __invoke(array $data): Doctrine;
}