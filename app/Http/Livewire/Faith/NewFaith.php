<?php

namespace App\Http\Livewire\Faith;

use App\Http\Requests\UpdateFaithRequest;
use App\Models\Faith;
use App\Models\Religion;
use App\Models\Denomination;
use App\Models\User;
use App\Services\FaithService;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Database\Eloquent\Collection;

class NewFaith extends ModalComponent
{
    public Collection $religions;

    public ?Collection $denominations = null;

    protected FaithService $faithService;

    public User $user;

    public array $state = [];

    protected array $rules = [
        'state.religion_id' => 'required|integer',
        'state.start_of_faith' => 'required|date',
        'state.end_of_faith' => 'required|date',
        'state.reason_left' => 'required|string'
    ];

    protected array $messages = [
        'state.religion_id.required' => 'Religion is required',
        'state.religion_id.integer' => 'Religion must be an ID',
        'state.start_of_faith.required' => 'Must have a beginning of faith',
        'state.start_of_faith.date' => 'Start of faith must be a date',
        'state.end_of_faith.required' => 'Previous faith must have an end date',
        'state.end_of_faith.date' => 'End of faith must be a date',
        'state.reason_left.required' => 'There must be a reason for leaving',
        'state.reason_left.string' => 'Reason for leaving must be a string'
    ];

    public function mount(array $userInfo)
    {
        $this->user = new User($userInfo);

        $this->religions = Religion::query()
            ->where('approved', true)
            ->get();

        $this->denominations = $denominations ?? Denomination::query()
            ->where('religion_id', $this->religions->first()->getKey())
            ->get();

        $this->faithService = new FaithService();

        $this->state['religion_id'] = $this->religions->first()->getKey();
        $this->state['denomination_id'] = $this->denominations?->first()?->getKey() ?? null;
    }

    public function submit()
    {
        $this->validate();

        $previousData = [
            'end_of_faith' => $this->state['end_of_faith'],
            'reason_left' => $this->state['reason_left']
        ];

        unset($this->state['end_of_faith'], $this->state['reason_left']);

        $this->faithService->updateUserFaith(
            new UpdateFaithRequest(request: $this->state),
            $this->user
        );

        Faith::query()
            ->where('id', auth()->user()->faith_id)
            ->update($previousData);

        $newFaith = Faith::query()
            ->create($this->state);

        User::query()
            ->update(['faith_id' => $newFaith->getKey()]);

        $this->closeModalWithEvents([
            'updated-faith'
        ]);
    }

    public function updatedStateReligionId()
    {
        $this->denominations = Denomination::query()
            ->where('religion_id', $this->state['religion_id'])
            ->get();
    }

    public function render()
    {
        return view('livewire.faith.new-faith');
    }
}
