<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class EditCard extends ModalComponent
{
    public Card $card;
    public string $cardName;

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    protected array $rules = [
        'card.name' => 'required|min:2',
        'card.type' => 'required'
    ];

    public function mount($id)
    {
        $this->card = Card::find($id);
        $this->cardName = $this->card->name;
    }

    public function render(): View
    {
        return view('livewire.edit-card');
    }

    public function update()
    {
        $this->validate();

        $this->card->save();

        $this->emit('reload', [
            'message' => __('kanban.updated', ['entity' => 'card'])
        ]);

        $this->closeModal();
    }
}
