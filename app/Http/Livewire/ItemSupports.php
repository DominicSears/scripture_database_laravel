<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ItemSupports extends Component
{
    public Model $item;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.item-supports');
    }
}
