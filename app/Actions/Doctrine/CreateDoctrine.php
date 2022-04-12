<?php

namespace App\Actions\Doctrine;

use App\Models\Doctrinable;
use App\Models\Doctrine;
use App\Contracts\Doctrine\CreatesDoctrine;
use App\Contracts\Doctrine\ValidatesDoctrine;
use Illuminate\Validation\ValidationException;

final class CreateDoctrine implements CreatesDoctrine
{
    public function __construct(private ValidatesDoctrine $doctrineValidator) {}

    /**
     * @throws ValidationException
     */
    public function __invoke(array $data): void
    {
        [$doctrineValidator, $doctrinableValidator] = ($this->doctrineValidator)($data);

        $doctrineValidated = $doctrineValidator->validate();
        $doctrinableValidated = $doctrinableValidator->validate();

        Doctrine::query()->create($doctrineValidated);
        Doctrinable::query()->create($doctrinableValidated);
    }
}
