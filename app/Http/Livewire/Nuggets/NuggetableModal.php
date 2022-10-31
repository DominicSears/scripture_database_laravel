<?php

namespace App\Http\Livewire\Nuggets;

use App\Models\Nugget;
use LivewireUI\Modal\ModalComponent;

class NuggetableModal extends ModalComponent
{
    public string $itemTitle;

    public ?string $itemDescription = null;

    public array $nuggetIds;

    public int $nuggetTypeId;

    public array $nuggets;

    public function mount()
    {
        $nuggets = Nugget::query()
            ->whereIn('id', $this->nuggetIds)
            ->get();

        $this->nuggets = $nuggets->toArray();
    }

    public function render()
    {
        return view('livewire.nuggets.nuggetable-modal');
    }
}
