<?php

namespace App\Contracts\Religion;

use App\Models\Religion;

interface UpdatesReligion
{
    /**
     * Update religion with provided data
     *
     * @param  array  $data
     * @param  Religion  $religion
     * @return void
     */
    public function __invoke(array $data, Religion $religion): void;
}
