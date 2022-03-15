<?php

namespace App\Actions\Doctrine;

use App\Models\Doctrine;
use App\Contracts\Doctrine\CreatesDoctrine;
use App\Contracts\Doctrine\ValidatesDoctrine;

final class CreateDoctrine implements CreatesDoctrine
{
    public function __construct(private ValidatesDoctrine $doctrineValidator) {}

    public function __invoke(array $data): Doctrine
    {
        $validated = ($this->doctrineValidator)($data)->validate();

        // TODO: Create and validate doctrineable
        return Doctrine::query()->create($validated);
    }
}