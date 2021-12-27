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

    public function mount(Faith $faith, Collection $religions, User $user)
    {
        $this->religions = $religions->isNotEmpty() ? $religions : Religion::query()
            ->where('approved', true)
            ->get();

        $this->faith = $faith;

        $this->state = $faith->toArray();

        $this->user = $user;

        $this->denominations = Denomination::query()
            ->where('religion_id', $this->state['religion_id'])
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
            'userInfo' => $this->user
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

    public function render()
    {
        return view('livewire.faith.edit-faith');
    }
}
