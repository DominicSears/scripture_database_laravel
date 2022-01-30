<?php

namespace App\Http\Livewire\Faith;

use App\Models\User;
use App\Models\Faith;
use App\Models\Religion;
use App\Models\Denomination;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Database\Eloquent\Collection;

class EditFaith extends ModalComponent
{
    public Collection $religions;

    public ?Collection $denominations = null;

    public Faith $faith;

    public array $state = [];

    public User $user;

    protected $listeners = [
        'updated-faith' => 'updatedFaith'
    ];

    public function mount(Faith $faith, User $user)
    {
        $this->religions = Religion::query()
            ->where('approved', true)
            ->get();

        $this->faith = $faith;

        $this->state = $faith->toArray();

        $this->user = $user;

        $this->denominations = Denomination::query()
            ->where('religion_id', $this->state['religion_id'])
            ->where('approved', true)
            ->get();
    }

    public function updatedStateReligionId()
    {
        $this->denominations = Denomination::query()
            ->where('religion_id', $this->state['religion_id'])
            ->get();
    }

    public function newFaith()
    {
        $this->emit('openModal', NewFaith::getName(), [
            'user_id' => $this->user->getKey()
        ]);
    }

    public function updatedFaith()
    {
        $this->state = Faith::query()
            ->where('user_id', auth()->id())
            ->latest('id')
            ->first()
            ->toArray();
    }

    public function showLoad()
    {
        $this->showLoad = ! $this->showLoad;
    }

    public function render()
    {
        return view('livewire.faith.edit-faith');
    }
}
