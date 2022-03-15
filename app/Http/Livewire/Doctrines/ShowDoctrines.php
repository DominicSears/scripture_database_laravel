<?php

namespace App\Http\Livewire\Doctrines;

use Livewire\Component;

use App\Models\Religion;
use App\Models\Denomination;

class ShowDoctrines extends Component
{
    public Religion|Denomination $entity;

    protected const ALLOWED_CLASSES = [
        'App\Models\Religion',
        'App\Models\Denomination'
    ];

    public function mount(?string $className = null, ?int $id = null)
    {
        if (isset($className)) {
            if (! in_array($className, self::ALLOWED_CLASSES) || is_null($id)) {
                // TODO: Throw custom exception
            }

            $this->entity = $className::query()
                ->with('doctrines')
                ->find($id);
        }
    }

    public function render()
    {
        return view('livewire.doctrines.show-doctrines');
    }
}
