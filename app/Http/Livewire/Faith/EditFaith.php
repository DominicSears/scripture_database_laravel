<?php

namespace App\Http\Livewire\Faith;

use App\Models\Denomination;
use App\Models\Faith;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Database\Eloquent\Collection;

class EditFaith extends ModalComponent
{
    public Collection $religions;

    public ?Collection $denominations = null;

    public Faith $faith;

    public array $state = [];

    public function mount(Faith $faith, Collection $religions)
    {
        $this->religions = $religions;

        $this->faith = $faith;

        $this->state = $faith->toArray();

        $this->denominations = Denomination::query()
            ->where('religion_id', $this->state['religion_id'])
            ->get();
    }

    public function updatedStateReligionId()
    {
        $this->denominations = Denomination::query()
            ->where('religion_id', $this->state['religion_id'])
            ->get();
    }

    public function newFaith()
    {
        $this->emit('openModal', NewFaith::getName(), [
            'religions' => $this->religions
        ]);
    }

    public function render()
    {
        return view('livewire.faith.edit-faith');
    }
}
