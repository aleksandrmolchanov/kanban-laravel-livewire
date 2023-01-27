<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class EditGroup extends ModalComponent
{
    public string $name;
    public Group $group;

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    protected array $rules = [
        'group.name' => ''
    ];

    public function mount($id)
    {
        $this->group = Group::find($id);
        $this->groupName = $this->group->name;
    }

    public function render(): View
    {
        return view('livewire.edit-group');
    }

    public function update()
    {
        $this->validate([
            'group.name' => 'required|min:2|unique:App\Models\Group,name,' . $this->group->id
        ]);

        $this->group->save();

        $this->emit('reload', [
            'message' => __('kanban.updated', ['entity' => 'group'])
        ]);

        $this->closeModal();
    }
}
