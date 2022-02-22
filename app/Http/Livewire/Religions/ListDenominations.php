<?php

namespace App\Http\Livewire\Religions;

use App\Models\Denomination;
use App\Models\Religion;
use LivewireUI\Modal\ModalComponent;

class ListDenominations extends ModalComponent
{
    public Religion $religion;

    // TODO: Add listener for create and update denomination events

    public function mount()
    {
        if (! $this->religion->relationLoaded('denominations')) {
            $this->religion->load('denominations');
        }
    }

    public function approve($id)
    {
        Denomination::query()
            ->where('id', $id)
            ->update(['approved' => true]);

        $this->emit('updated-denominations');
    }

    public function edit($id)
    {
        $this->emit('openModal', UpdateDenomination::getName(), [
            'religionData' => $this->religion->withoutRelations()->toArray()
        ]);
    }

    public function render()
    {
        return view('livewire.religions.list-denominations');
    }
}
