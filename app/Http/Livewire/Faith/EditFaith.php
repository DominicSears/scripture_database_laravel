<?php

namespace App\Http\Livewire\Faith;

use App\Http\Livewire\NewFaith;
use App\Http\Requests\MakeFaithRequest;
use App\Models\Denomination;
use App\Models\Faith;
use App\Models\Religion;
use App\Models\User;
use App\Services\FaithService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use LivewireUI\Modal\ModalComponent;

class EditFaith extends ModalComponent
{
    public array $state = [];

    protected ?Collection $religions;

    protected ?Collection $denominations;

    protected User $user;

    public function mount(User $user, ?Collection $religions = null, ?Collection $denominations = null)
    {
        $this->user = $user;

        $this->religions = $religions ?? Religion::query()
            ->where('approved', true)
            ->get();

        $this->denominations = $denominations ?? Denomination::query()
            ->where('approved', true)
            ->get();

        if (! $this->user->relationLoaded('allFaiths')) {
            $this->user->load('allFaiths');
        }

        $this->state = $this->user->allFaiths->last()->toArray();
    }

    public function newFaith()
    {
        $this->emit('openModal', NewFaith::getName(), [
            'religions' => $this->religions,
            'denominations' => $this->denominations
        ]);
    }

    public function updateFaith()
    {
        FaithService::getFaithRequestValidator($this->state)->validate();

        $newFaith = FaithService::createFaith(array_merge(
            ['user_id' => $this->user->getKey()],
            $this->state
        ));

        $this->user->faith_id = $newFaith->getKey();

        $this->user->save();

        $this->closeModalWithEvents([
            'updated-faith'
        ]);
    }

    public function render()
    {
        return view('livewire.faith.edit-faith', [
            'user' => $this->user,
            'religions' => $this->religions,
            'denominations' => $this->denominations
        ]);
    }
}
