<?php

namespace App\Http\Livewire\Nuggets;

use App\Actions\Nuggets\CreateNugget;
use App\Models\Nugget;
use Illuminate\Validation\ValidationException;
use LivewireUI\Modal\ModalComponent;

class NuggetableModal extends ModalComponent
{
    public string $itemTitle;

    public ?string $itemDescription = null;

    public array $nuggetIds;

    public int $nuggetTypeId;

    public array $nuggets;

    public array $state = [];

    public function mount()
    {
        $nuggets = Nugget::query()
            ->whereIn('id', $this->nuggetIds)
            ->get();

        $this->nuggets = $nuggets->toArray();
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
