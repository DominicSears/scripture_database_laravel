<?php

namespace App\Http\Livewire\Denominations;

use App\Http\Livewire\ListItems;
use App\Models\Religion;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use App\Contracts\Denomination\CreatesDenomination;

class CreateDenomination extends ModalComponent
{
    public ?Collection $religions = null;

    public ?Religion $religion = null;

    public array $state = [];

    public ?string $alertType = null;

    public ?string $message = null;

    public function mount(?int $religionId = null)
    {
        $this->religions ??= Religion::query()
            ->with('denominations')
            ->where('approved', true)
            ->get();

        $this->religion ??= (
            isset($religionId) && $this->religions->contains($religionId)
                ? $this->religions->where('id', $religionId)->first()
                : $this->religions->first()
        );

        $this->state = [
            'religion_id' => $this->religion->getKey(),
        ];
    }

    /**
     * @param  CreatesDenomination  $createsDenomination
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submit(CreatesDenomination $createsDenomination)
    {
        try {
            $createsDenomination(
                array_merge($this->state, ['approved' => false, 'created_by' => auth()->id()])
            );
        } catch (ValidationException $e) {
            $this->message = $e->getMessage();
            $this->alertType = 'danger';
            $this->state = ['religion_id' => $this->religions->first()->getKey()];

            return;
        }

        $this->message = 'Denomination created!';
        $this->alertType = 'success';

        $this->emitTo(ListItems::getName(), 'update');
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
