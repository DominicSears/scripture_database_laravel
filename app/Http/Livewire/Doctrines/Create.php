<?php

namespace App\Http\Livewire\Doctrines;

use App\Contracts\Doctrine\CreatesDoctrine;
use App\Traits\ConvertEmptyArrayStrings;
use Livewire\Component;

class Create extends Component
{
    use ConvertEmptyArrayStrings;

    public array $state = [];

    public function submit(CreatesDoctrine $createDoctrine)
    {
        $createDoctrine($this->convertEmptyArrayStrings($this->state));
    }

    public function render()
    {
        return view('livewire.doctrines.create');
    }
}
