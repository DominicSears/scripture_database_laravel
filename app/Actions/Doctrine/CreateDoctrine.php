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
        if (isset($data['religion_id']) || isset($data['denomination_id'])) {
            $isDenomination = !empty($data['denomination_id']);

            $data['doctrinable_id'] = $isDenomination ? $data['denomination_id'] :
                $data['religion_id'];
            
            $data['doctrinable_type'] = $isDenomination ? Denomination::class : Religion::class;

            // Set a default ID
            $data['doctrine_id'] = 0;
        }

        [$doctrineValidator, $doctrinableValidator] = ($this->doctrineValidator)($data);

        $doctrineValidated = $doctrineValidator->validate();
        $doctrinableValidated = $doctrinableValidator->validate();

        $doctrine = Doctrine::query()->create($doctrineValidated);
        Doctrinable::query()->create($doctrinableValidated);
    }
}
