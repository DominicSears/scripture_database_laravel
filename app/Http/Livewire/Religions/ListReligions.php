<?php

namespace App\Http\Livewire\Religions;

use App\Models\Religion;
use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class ListReligions extends ModalComponent
{
    public ?Collection $religions = null;

    public bool $showPending = true;

    protected $listeners = [
        'created-religion' => '$refresh',
        'updated-religion' => '$refresh'
    ];

    public function mount()
    {
        if (is_null($this->religions)) {
            $religions = Religion::query();

            $this->religions = $this->showPending ?
                $religions->get() :
                $religions->where('approved', true)->get();
        }
    }

    public function approve()
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }

    public function newReligion()
    {
        // FIXME: Event not refreshing on modal
        $this->emit('openModal', Create::getName());
    }

    public function render()
    {
        return view('livewire.religions.list-religions');
    }
}
