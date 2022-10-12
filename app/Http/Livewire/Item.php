<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\MapsModels;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Item extends Component
{
    use MapsModels;

    public ?string $itemType = null;

    public Model $item;

    public User $user;

    public bool $hasControls = true;

    public function mount()
    {
        if (! $this->user->relationLoaded('faith') ||
        ! $this->user->getRelation('faith')->relationLoaded('religion') ||
        ! $this->user->getRelation('faith')->relationLoaded('denomination')) {
            $this->user->load([
                'faith' => [
                    'religion',
                    'denomination'
                ]
            ]);
        }

        $this->itemType = $this->mapToCodeName($this->item::class);
    }

    public function render()
    {
        return view('livewire.item');
    }
}
