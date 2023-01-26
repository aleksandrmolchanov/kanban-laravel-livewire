<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;

class AddCard extends ModalComponent
{
    public string $name;
    public int $group_id;

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    protected array $rules = [
        'name' => 'required|min:2'
    ];

    public function mount($group_id)
    {
        $this->group_id = $group_id;
    }

    public function render(): View
    {
        return view('livewire.add-card');
    }

    public function add()
    {
        $this->validate();

        $sortMax = DB::table('cards')
            ->where('group_id', $this->group_id)
            ->max('sort');

        Card::create([
            'name' => $this->name,
            'sort' => $sortMax ? $sortMax + 1 : 0,
            'group_id' => $this->group_id
        ]);

        $this->emit('reload', [
            'message' => __('kanban.added', ['entity' => 'card'])
        ]);

        $this->closeModal();
    }
}
