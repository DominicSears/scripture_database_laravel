<?php

namespace App\Http\Livewire\Religions;

use App\Contracts\Denomination\UpdatesDenomination;
use App\Models\Denomination;
use App\Models\Religion;
use LivewireUI\Modal\ModalComponent;

class UpdateDenomination extends ModalComponent
{
    public ?Religion $religion;

    public ?Denomination $denomination;

    public array $state = [];

    public function mount(array $religionData = [], ?int $denominationId = null)
    {
        if (! empty($religionData)) {
            $this->religion = new Religion($religionData);

            $this->religion->load('denominations');
        }

        if (isset($denominationId) && empty($this->denomination)) {
            $this->denomination = $this->religion->denominations->find($denominationId);
        }

        $this->state = $this->denomination->toArray();
    }

    public function submit(UpdatesDenomination $updatesDenomination)
    {
        $updatesDenomination($this->state, $this->denomination);

        $this->closeModalWithEvents([
            'updated-denomination'
        ]);
    }

    public function render()
    {
        return view('livewire.religions.update-denomination');
    }
}
