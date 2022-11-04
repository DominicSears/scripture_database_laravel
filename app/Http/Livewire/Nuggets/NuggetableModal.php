<?php

namespace App\Http\Livewire\Nuggets;

use App\Actions\Nuggets\CreateNugget;
use App\Models\Nugget;
use App\Traits\MapsModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use LivewireUI\Modal\ModalComponent;

class NuggetableModal extends ModalComponent
{
    use MapsModels;

    public Model $item;

    public string $itemClass;

    public int $itemId;

    public string $itemType;

    public array $nuggetIds;

    public int $nuggetTypeId;

    public array $state = [];

    public function mount()
    {
        $this->item = call_user_func([$this->itemClass, 'query'])
            ->with([
                'createdBy' => fn($q) => $q->select([
                    'first_name',
                    'last_name',
                    'id',
                    'faith_id',
                    'profile_photo_path'
                ]),
                'createdBy.faith.religion' => fn($q) => $q->select(['id', 'name']),
                'createdBy.faith.denomination' => fn($q) => $q->select(['id', 'name', 'religion_id'])
            ])
            ->find($this->itemId);

        $this->item->setRelation(
            'nuggets',
            Nugget::query()
                ->whereIn('id', $this->nuggetIds)
                ->get()
        );

        $this->itemType = $this->mapToCodeName($this->itemClass);
    }

    /**
     * @throws ValidationException
     */
    public function post(CreateNugget $createNugget)
    {
        $createNugget(array_merge($this->state, [
            'nugget_type_id' => $this->nuggetTypeId
        ]));
    }

    public function render()
    {
        return view('livewire.nuggets.nuggetable-modal');
    }
}
