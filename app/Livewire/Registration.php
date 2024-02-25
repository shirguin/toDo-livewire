<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\User;
use Livewire\WithFileUploads;

class Registration extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|email|max:255|unique:users')]
    public $email;

    #[Rule('required|min:3')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function create()
    {

        // sleep(2);

        $validated = $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        $user = User::create($validated);

        $this->reset('name', 'email', 'password', 'image');

        session()->flash('success', 'Аккаунт создан!');

        $this->dispatch('user-created', $user);
    }

    public function reloadList()
    {
        $this->dispatch('user-created');
    }

    public function render()
    {
        return view('livewire.registration');
    }
}
