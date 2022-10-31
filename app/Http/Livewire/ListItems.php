<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\MapsModels;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class ListItems extends Component
{
    use MapsModels;

    /** @var class-string */
    public string $classType;

    /** @var Collection<Model> */
    public Collection $items;

    public ?string $modalName = null;

    public array $modalParams = [];

    public ?string $button = null;

    public function mount()
    {
        $this->title ??= str($this->mapToCodeName($this->classType))
            ->plural();

        $this->items ??= collect();
    }

    public function render()
    {
        return view('livewire.list-items');
    }
}
