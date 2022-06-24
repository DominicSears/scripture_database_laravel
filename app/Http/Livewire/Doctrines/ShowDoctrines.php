<?php

namespace App\Http\Livewire\Doctrines;

use App\Exceptions\Doctrine\InvalidDoctrineSourceException;
use App\Models\Denomination;
use App\Models\Religion;
use Livewire\Component;

class ShowDoctrines extends Component
{
    public Religion|Denomination $entity;

    public bool $childrenHaveDoctrine = false;

    public bool $isReligion;

    public bool $showChildren = true;

    protected const ALLOWED_CLASSES = [
        'App\Models\Religion',
        'App\Models\Denomination',
    ];

    /**
     * @throws InvalidDoctrineSourceException
     */
    public function mount(?string $className = null, ?int $id = null, bool $showChildren = true)
    {
        // TODO: Do not repeat a doctrine if it is already in the children? Or parent?

        if (isset($className)) {
            if (! in_array($className, self::ALLOWED_CLASSES) || is_null($id)) {
                throw new InvalidDoctrineSourceException($className);
            }

            $this->entity = call_user_func([$className, 'query'])
                ->with('doctrines')
                ->find($id);
        }

        if (! $this->entity->relationLoaded('doctrines')) {
            $this->entity->load('doctrines.nuggets');
        }

        if ($this->isReligion = $this->entity instanceof Religion) {
            $this->childrenHaveDoctrine = $this->entity->denominations
                    ->filter(fn ($v) => $v->doctrines->isNotEmpty())
                    ->isNotEmpty();
        }
    }

    public function render()
    {
        return view('livewire.doctrines.show-doctrines');
    }
}
