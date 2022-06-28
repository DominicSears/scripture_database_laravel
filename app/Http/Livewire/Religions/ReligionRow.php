<?php

namespace App\Http\Livewire\Religions;

use Livewire\Component;
use App\Models\Religion;

class ReligionRow extends Component
{
    public Religion $religion;

    public function edit()
    {
        $this->emit('openModal', Edit::getName(), [
            'religionId' => $this->religion->getKey(),
        ]);
    }

    public function approve()
    {
        $this->religion->approved = true;
        $this->religion->save();

        $this->emit('updated-religion');
    }

    public function render()
    {
        return view('livewire.religions.religion-row');
    }
}
