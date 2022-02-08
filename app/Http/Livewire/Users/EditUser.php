<?php

namespace App\Http\Livewire\Users;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use App\Traits\MapsState;
use Livewire\Component;

class EditUser extends Component
{
    use MapsState;

    public User $user;

    public array $state = [];


    public function mount(?int $userId = null)
    {
        $this->user ??= User::query()
            ->find($userId ?? auth()->id());

        $this->state = $this->user->toArray();
    }

    public function submit()
    {
        UserService::updateUser(
            new UpdateUserRequest(request: $this->removeStateKeys($this->state)),
            $this->user
        );
    }
    
    public function render()
    {
        return view('livewire.users.edit-user');
    }
}
