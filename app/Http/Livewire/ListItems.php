<?php

namespace App\Http\Livewire;

use App\Traits\MapsModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Livewire\Component;

class ListItems extends Component
{
    use MapsModels;

    /** @var class-string $classType */
    public string $classType;

    /** @var Collection<Model> $items */
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
