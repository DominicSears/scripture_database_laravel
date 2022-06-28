<?php

namespace App\Http\Livewire\Religions;

use App\Models\Religion;
use LivewireUI\Modal\ModalComponent;
use App\Traits\ConvertEmptyArrayStrings;
use App\Contracts\Religion\UpdatesReligion;
use Illuminate\Database\Eloquent\Collection;

class Edit extends ModalComponent
{
    use ConvertEmptyArrayStrings;

    public ?Religion $religion = null;

    public ?Collection $religions = null;

    public array $state = [];

    public function mount($religionId = null, $religionData = [])
    {
        if (is_null($this->religion)) {
            if (is_null($religionId) || ! is_numeric($religionId)) {
                // TODO: Throw custom exception
            }

            $this->religion = Religion::query()->find($religionId);
        }

        $this->religions ??= Religion::query()
            ->whereNot('id', $this->religion->getKey())
            ->where('approved', true)
            ->get();

        $this->state = $this->religion->toArray();
    }

    public function submit(UpdatesReligion $updateReligion)
    {
        $updateReligion(
            $this->convertEmptyArrayStrings($this->state),
            $this->religion
        );

        $this->closeModalWithEvents([
            'updated-religion',
        ]);
    }

    public function render()
    {
        return view('livewire.religions.edit');
    }
}
