<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class UsersList extends Component
{
    use WithPagination;

    #[On('user-created')]
    public function updateList($user = null)
    {
    }

    #[Computed()]
    public function users()
    {
        return User::latest()->paginate(5);
    }
    public function render()
    {
        return view('livewire.users-list');
    }
}
