<?php

namespace App\Actions\Doctrinable;

use App\Models\Doctrinable;
use App\Contracts\Doctrinable\CreatesDoctrinable;
use App\Contracts\Doctrinable\ValidatesDoctrinable;

final class CreateDoctrinable implements CreatesDoctrinable
{
    public function __construct(protected ValidatesDoctrinable $doctrinableValidator)
    {
    }

    /**
     * Create a doctrinable entry
     *
     * @param  array  $data
     * @return void
     *
     * @throws Illuminate\Validation\ValidationException
     */
    public function __invoke(array $data): void
    {
        $validated = ($this->doctrinableValidator)($data, false)->validate();

        Doctrinable::query()->create($validated);
    }
}
