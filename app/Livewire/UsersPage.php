<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;

#[Layout('layout.app')]
#[Title('Users')]
class UsersPage extends Component
{
    public User $user;

    // public function mount(User $user)
    // {
    //     $this->user = $user;
    // }
    public function render()
    {
        return view('livewire.users-page');
    }
}
