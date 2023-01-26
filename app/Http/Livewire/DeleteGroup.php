<?php

namespace App\Http\Livewire;

use App\Models\Group;
use LivewireUI\Modal\ModalComponent;

class DeleteGroup extends ModalComponent
{
    public Group $group;

    public function mount($id)
    {
        $this->group = Group::find($id);
    }

    public function render()
    {
        return view('livewire.delete-group');
    }

    public function delete()
    {
        $this->group->delete();

        $this->emit('reload', [
            'message' => __('kanban.deleted', ['entity' => 'group'])
        ]);

        $this->closeModal();
    }
}
