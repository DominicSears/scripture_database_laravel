<?php

namespace App\Http\Livewire\Religions;

use App\Models\Religion;
use LivewireUI\Modal\ModalComponent;
use App\Traits\ConvertEmptyArrayStrings;
use App\Contracts\Denomination\CreatesDenomination;

class CreateDenominations extends ModalComponent
{
    use ConvertEmptyArrayStrings;

    public Religion $religion;

    public array $state = [];

    public function mount(array $religionData = [])
    {
        if (! empty($religionData)) {
            $this->religion = with(new Religion())->newInstance($religionData, true);
        }

        $this->state = [
            'religion_id' => $this->religion->getKey(),
            'approved' => false,
            'created_by' => auth()->id(),
            'parent_id' => null,
        ];
    }

    public function submit(CreatesDenomination $createsDenomination)
    {
        $createsDenomination(
            $this->convertEmptyArrayStrings($this->state)
        );

        $this->closeModalWithEvents([
            'created-denomination',
        ]);
    }

    public function render()
    {
        return view('livewire.religions.create-denominations');
    }
}
