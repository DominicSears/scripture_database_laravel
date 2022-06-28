<?php

namespace App\Http\Livewire\Denominations;

use App\Models\Religion;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Database\Eloquent\Collection;

class CreateDenomination extends ModalComponent
{
    public ?Collection $religions = null;

    public ?Religion $religion = null;

    public array $state = [];

    public function mount()
    {
        $this->religions ??= Religion::query()
            ->with('denominations')
            ->where('approved', true)
            ->get();

        $this->religion ??= $this->religions->first();

        $this->state = [
            'religion_id' => $this->religion->getKey(),
            'approved' => false,
        ];
    }

    public function updatedStateReligionId()
    {
        $this->religion = Religion::query()
            ->with('denominations')
            ->find($this->state['religion_id']);

        $this->state['parent_id'] = null;
    }

    public function render()
    {
        return view('livewire.denominations.create-denomination');
    }
}
