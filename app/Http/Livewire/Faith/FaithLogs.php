<?php

namespace App\Http\Livewire\Faith;

use App\Models\Faith;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class FaithLogs extends Component
{
    public ?Collection $faiths;

    public ?int $userId = null;

    public ?int $selectedId = null;

    public function mount()
    {
        $this->faiths ??= Faith::query()
            ->where('user_id', $this->userId ?? auth()->id())
            ->get();
    }

    protected $listeners = [
        'updated-faith' => 'updatedFaith',
    ];

    public function updatedFaith()
    {
        // TODO: Find out why component isn't rendering after this event happens
        $this->faiths = Faith::query()
            ->where('user_id', $this->userId ?? $this->faiths->first()->user_id)
            ->get();
    }

    public function render()
    {
        return view('livewire.faith.faith-logs');
    }
}
