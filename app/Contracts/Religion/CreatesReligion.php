<?php

namespace App\Contracts\Religion;

use App\Models\Religion;

interface CreatesReligion
{
    /**
     * Creates a religion
     *
     * @param array $data
     * @return Religion
     */
    public function __invoke(array $data): Religion;
}
