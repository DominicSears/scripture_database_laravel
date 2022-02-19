<?php

namespace App\Http\Livewire\Religions;

use App\Contracts\Denomination\CreatesDenomination;
use App\Models\Religion;
use LivewireUI\Modal\ModalComponent;

class CreateDenominations extends ModalComponent
{
    public Religion $religion;

    public array $state = [];

    public function mount()
    {
        $this->state = [
            'religion_id' => $this->religion->getKey(),
            'approved' => false,
            'created_by' => auth()->id(),
            'parent_id' => null
        ];
    }

    public function submit(CreatesDenomination $createsDenomination)
    {
        $createsDenomination($this->state);
    }

    public function render()
    {
        return view('livewire.religions.create-denominations');
    }
}
