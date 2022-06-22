<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Feed extends Component
{
    public array $filter = [
        'browse_all' => true,
        'recent' => false,
        'following' => false
    ];

    public function filter(string $filterBy)
    {
        $array = array_diff_key($this->filter, array_flip([$filterBy]));

        $this->filter[$filterBy] = true;

        foreach($array as $key => $set) {
            $this->filter[$key] = false;
        }
    }

    public function render()
    {
        return view('livewire.feed');
    }
}
