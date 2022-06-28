<?php

namespace App\Http\Livewire\Faith;

use App\Models\User;
use App\Models\Religion;
use App\Models\Denomination;
use LivewireUI\Modal\ModalComponent;
use App\Contracts\Faith\CreatesFaith;
use Illuminate\Database\Eloquent\Collection;

class NewFaith extends ModalComponent
{
    public Collection $religions;

    public ?Collection $denominations = null;

    public int $user_id;

    public User $user;

    public array $state = [];

    public array $rules = [];

    public function mount(int $user_id)
    {
        $this->user = User::query()
            ->with(['allFaiths'])
            ->find($user_id);

        $this->religions = Religion::query()
            ->where('approved', true)
            ->get();

        $this->denominations = Denomination::query()
            ->where('religion_id', $this->religions->first()->getKey())
            ->get();

        $this->state['religion_id'] = $this->religions->first()->getKey();
        $this->state['denomination_id'] = $this->denominations?->first()?->getKey() ?? null;
        $this->state['user_id'] = $this->user_id;
    }

    public function submit(CreatesFaith $createsFaith)
    {
        $createsFaith($this->state, $this->denominations->isNotEmpty(), $this->user);

        $this->closeModalWithEvents([
            'updated-faith',
        ]);
    }

    public function updatedStateReligionId()
    {
        $this->denominations = Denomination::query()
            ->where('religion_id', $this->state['religion_id'])
            ->get();

        $this->state['denomination_id'] = null;
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    public function render()
    {
        return view('livewire.faith.new-faith');
    }
}
