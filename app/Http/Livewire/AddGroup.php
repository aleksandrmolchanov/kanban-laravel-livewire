<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;

class AddGroup extends ModalComponent
{
    public string $name;

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    protected array $rules = [
        'name' => 'required|min:2'
    ];

    public function render(): View
    {
        return view('livewire.add-group');
    }

    public function add()
    {
        $this->validate();

        $sortMax = DB::table('groups')->max('sort');

        Group::create([
            'name' => $this->name,
            'sort' => $sortMax ? $sortMax + 1 : 0,
        ]);

        $this->emit('reload', [
            'message' => __('kanban.added', ['entity' => 'group'])
        ]);

        $this->closeModal();
    }
}
