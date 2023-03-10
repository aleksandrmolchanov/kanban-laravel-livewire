<?php

namespace App\Http\Livewire;

use App\Models\Card;
use App\Models\Group;
use Livewire\Component;

class Kanban extends Component
{
    protected $listeners = ['reload'];

    public function reload($params)
    {
        if(isset($params['message']))
        {
            session()->flash('message', $params['message']);
        }
        $this->render();
    }

    public function clearMessage()
    {
        session()->forget('message');
    }

    public function render()
    {
        $groups = Group::orderBy('sort')->with('cards')->get();

        return view('livewire.kanban', [
            'groups' => $groups
        ]);
    }

    public function addCard($group_id)
    {
        Card::create([
            'name' => uniqid(),
            'group_id' => $group_id
        ]);
    }

    public function updateGroupOrder($order)
    {
        foreach ($order as $group)
        {
            Group::where(['id' => $group['value']])->update([
                'sort' => $group['order']
            ]);
        }
    }

    public function updateCardOrder($order)
    {
        foreach ($order as $group)
        {
            foreach ($group['items'] as $card){
                Card::where(['id' => $card['value']])->toBase()->update([
                    'group_id' => $group['value'],
                    'sort' => $card['order']
                ]);
            }
        }
    }
}
