<?php

namespace App\Http\Livewire\Nuggets;

use Livewire\Component;
use App\Models\Religion;
use App\Traits\MapsModels;
use Illuminate\Database\Eloquent\Model;

class Create extends Component
{
    use MapsModels;

    public ?string $type = null;

    public ?int $modelId = null;

    public Model $model;

    public function mount()
    {
        $this->type ??= $this->mapToCodeName(Religion::class);

        $this->modelId ??= 1;

        $this->model = call_user_func([$this->mapToClassName($this->type), 'query'])
            ->find($this->modelId);
    }

    public function render()
    {
        return view('livewire.nuggets.create');
    }
}
