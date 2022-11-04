<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Nuggets\NuggetableModal;
use App\Models\Nugget;
use Livewire\Component;
use App\Traits\MapsModels;
use Illuminate\Database\Eloquent\Model;

class ItemNuggetable extends Component
{
    use MapsModels;

    public Model $item;

    public ?int $nuggetableTypeId = null;

    public array $nuggetableArray;

    public int $nuggetableAmount;

    public function mount()
    {
        if (! $this->item->relationLoaded('nuggets')) {
            $this->item->load('nuggets');
        }

        $this->nuggetableArray = $this->item->nuggets
            ->where('pivot.nugget_type_id', $this->nuggetableTypeId ?? Nugget::NUGGET_TYPE_SUPPORT)
            ->toArray();

        $this->nuggetableAmount = count($this->nuggetableArray);
    }

    public function openNuggetableModal()
    {
        $this->emit('openModal', NuggetableModal::getName(), [
            'itemId' => $this->item->getKey(),
            'itemClass' => $this->item::class,
            'nuggetTypeId' => $this->nuggetableTypeId,
            'nuggetIds' => array_map(
                fn($n) => $n['id'],
                $this->nuggetableArray
            )
        ]);
    }

    public function render()
    {
        return view('livewire.item-nuggetable');
    }
}
