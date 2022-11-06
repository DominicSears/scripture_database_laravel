<?php

namespace App\Http\Livewire;

use App\Contracts\Approvable;
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

    public array $itemState = [
        'updated' => []
    ];

    public function mount()
    {
        $this->title ??= str($this->mapToCodeName($this->classType))
            ->plural();

        $this->items ??= collect();
    }

    protected function action(int $index, string $type): void
    {
        if ($this->items->count() > $index) {
            $item = $this->items->get($index);

            if ($item instanceof Approvable) {
                call_user_func([$item, $type]);
            }
        }

        $this->itemState['updated'][] = $index;
    }

    public function approve(int $index)
    {
        $this->action($index, 'approve');
    }

    public function delete(int $index)
    {
        $this->action($index, 'deny');
    }

    public function render()
    {
        return view('livewire.list-items');
    }
}
