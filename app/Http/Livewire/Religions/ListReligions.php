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

    public function approve($id)
    {
        if (is_numeric($id)) {
            // TODO: Change from this edit to the edit modal
            Religion::query()
            ->where('id', $id)
            ->update(['approved' => true]);

            $this->emit('updated-religion');
        }
    }

    public function edit($id)
    {
        $this->emit('openModal', Edit::getName(), [
            'religionId' => $id,
        ]);
    }

    public function delete()
    {

    }

    public function showPending()
    {
        // Maybe there is a better way for this?
        // Might need to fix for pagination
        // Only show if user is admin
        $this->showPending = ! $this->showPending;

        $this->religions = $this->showPending ?
            Religion::query()->get() :
            Religion::query()->where('approved', true)->get();
    }

    public function newReligion()
    {
        // FIXME: Event not refreshing on modal
        $this->emit('openModal', Create::getName());
        $this->emit('created-religion');
    }

    public function render()
    {
        return view('livewire.religions.list-religions');
    }
}
