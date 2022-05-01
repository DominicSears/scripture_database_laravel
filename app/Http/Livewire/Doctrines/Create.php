<?php

namespace App\Http\Livewire\Doctrines;

use Livewire\Component;
use App\Models\Religion;
use App\Models\Denomination;
use App\Traits\ConvertEmptyArrayStrings;
use App\Contracts\Doctrine\CreatesDoctrine;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Create extends Component
{
    use ConvertEmptyArrayStrings;

    public array $state = [];

    public string $type;

    public Religion|Denomination $entity;

    /**
     * Constructor for Livewire component
     *
     * @param string $type
     * @param int $typeId
     * @throws NotFoundHttpException
     * @return void
     */
    public function mount(string $type, int $typeId)
    {
        $this->type = match($type) {
            'religion' => Religion::class,
            'denomination' => Denomination::class,
            default => throw new NotFoundHttpException()
        };

        /** @var Model $entity */
        $this->entity = $type::query()->find($typeId);
    }

    public function submit(CreatesDoctrine $createDoctrine)
    {
        $createDoctrine(
            $this->convertEmptyArrayStrings($this->state)
        );
    }

    public function render()
    {
        return view('livewire.doctrines.create');
    }
}
