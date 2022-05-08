<?php

namespace App\Actions\Doctrinable;

use App\Contracts\Doctrinable\CreatesDoctrinable;

final class CreateDoctrinable implements CreatesDoctrinable
{
    public function __construct(protected ValidatesDoctrinable $doctrinableValidator) {}

    public function __invoke(array $data, bool $isUpdate): void
    {

    }
}
