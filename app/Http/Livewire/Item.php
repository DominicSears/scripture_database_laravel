<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Traits\MapsModels;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Item extends Component
{
    use MapsModels;

    public ?string $itemType = null;

    public Model $item;

    public User $user;

    public bool $hasControls = true;

    public ?string $padding = null;

    public function mount()
    {
        if (! $this->user->relationLoaded('faith') ||
        ! $this->user->getRelation('faith')->relationLoaded('religion') ||
        ! $this->user->getRelation('faith')->relationLoaded('denomination')) {
            $this->user->load([
                'faith' => [
                    'religion',
                    'denomination',
                ],
            ]);
        }

        $this->itemType = $this->mapToCodeName($this->item::class);

        $modelRelations = array_keys($this->item->getRelations());
        $relationsToLoad = [
            'nuggets',
            'comments',
            'votes',
        ];

        if (! Arr::has($modelRelations, $relationsToLoad)) {
            $this->item->load($relationsToLoad);
        }
    }

    public function render()
    {
        return view('livewire.item');
    }
}
