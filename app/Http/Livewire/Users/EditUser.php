<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use App\Traits\MapsState;
use App\Contracts\User\UpdatesUser;

class EditUser extends Component
{
    use MapsState;

    public User $user;

    public array $state = [];

    public function mount(?int $userId = null)
    {
        $this->user ??= User::query()
            ->find($userId ?? auth()->id());

        $this->state = $this->user->withoutRelations()
            ->toArray();
    }

    public function submit(UpdatesUser $userUpdater)
    {
        ($userUpdater)($this->state, $this->user);
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }
}
