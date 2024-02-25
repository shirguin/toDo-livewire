<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Todo;
use Livewire\WithPagination;
use Exception;

class TodoList extends Component
{
    //функция разбиения на страницы
    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public $editingTodoId;

    #[Rule('required|min:3|max:50')]
    public $editingTodoName;

    public function create()
    {
        //validate
        //create the todo
        //clear the input
        //send flash message

        $validated = $this->validateOnly('name');

        Todo::create($validated);

        $this->reset('name');

        session()->flash('success', 'Сохранено');

        //Отправляем пользователя на первую страницу
        $this->resetPage();
    }

    public function delete($todoId)
    {
        try {
            Todo::findOrfail($todoId)->delete();
        } catch (Exception $e) {
            session()->flash('error', 'Не удалось удалить!');
            return;
        }
    }

    public function toggle($todoId)
    {
        $todo = Todo::find($todoId);

        $todo->completed = !$todo->completed;

        $todo->save();
    }

    public function edit($todoId)
    {
        $this->editingTodoId = $todoId;
        $this->editingTodoName = Todo::find($todoId)->name;
    }

    public function cancelEdit()
    {
        $this->reset('editingTodoId', 'editingTodoName');
    }

    public function update()
    {
        $this->validateOnly('editingTodoName');

        Todo::find($this->editingTodoId)->update([
            'name' => $this->editingTodoName
        ]);

        $this->cancelEdit();
    }
    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5),
        ]);
    }
}
