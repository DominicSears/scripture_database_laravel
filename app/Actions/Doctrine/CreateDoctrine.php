<?php

namespace App\Actions\Doctrine;

use App\Models\Doctrine;
use App\Models\Doctrinable;
use App\Contracts\Doctrine\CreatesDoctrine;
use App\Contracts\Doctrine\ValidatesDoctrine;
use Illuminate\Validation\ValidationException;
use App\Contracts\Doctrinable\ValidatesDoctrinable;

final class CreateDoctrine implements CreatesDoctrine
{
    public function __construct(
        private ValidatesDoctrine $doctrineValidator,
        private ValidatesDoctrinable $doctrinableValidator
    ) {
    }

    /**
     * @throws ValidationException
     */
    public function __invoke(array $data): void
    {
        $doctrineValidated = ($this->doctrineValidator)($data)->validate();

        $doctrine = Doctrine::query()->create($doctrineValidated);

        $data['doctrine_id'] = $doctrine->getKey();

        $doctrinableValidated = ($this->doctrinableValidator)($data)->validate();

        $doctrinable = Doctrinable::query()->create($doctrinableValidated);
    }
}
