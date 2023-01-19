<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Group;
use Livewire\Component;

class Kanban extends Component
{
    public function render()
    {
        $groups = Group::orderBy('sort')->with('cards')->get();

        return view('livewire.kanban', [
            'groups' => $groups
        ]);
    }

    public function addGroup()
    {
        Group::create([
           'name' => uniqid()
        ]);
    }

    public function addCard($group_id)
    {
        Card::create([
            'name' => uniqid(),
            'group_id' => $group_id
        ]);
    }

    public function deleteGroup($id)
    {
        Group::destroy($id);
    }

    public function deleteCard($id)
    {
        Card::destroy($id);
    }
}
