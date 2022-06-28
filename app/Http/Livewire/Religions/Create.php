<?php

namespace App\Http\Livewire\Religions;

use App\Models\Religion;
use LivewireUI\Modal\ModalComponent;
use App\Traits\ConvertEmptyArrayStrings;
use App\Contracts\Religion\CreatesReligion;
use Illuminate\Database\Eloquent\Collection;

class Create extends ModalComponent
{
    use ConvertEmptyArrayStrings;

    public ?Collection $religions = null;

    public array $state = [];

    public function mount()
    {
        $this->religions ??= Religion::query()
            ->where('approved', true)
            ->get();

        $this->state = [
            'approved' => false,
            'created_by' => auth()->id(),
        ];
    }

    public function submit(CreatesReligion $createsReligion)
    {
        $createsReligion(
            $this->convertEmptyArrayStrings($this->state)
        );

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.religions.create');
    }
}
