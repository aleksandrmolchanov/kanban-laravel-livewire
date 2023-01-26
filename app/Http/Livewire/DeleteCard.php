<?php

namespace App\Http\Livewire;

use App\Models\Card;
use LivewireUI\Modal\ModalComponent;

class DeleteCard extends ModalComponent
{
    public Card $card;

    public function mount($id)
    {
        $this->card = Card::find($id);
    }

    public function render()
    {
        return view('livewire.delete-card');
    }

    public function delete()
    {
        $this->card->delete();

        $this->emit('reload', [
            'message' => __('kanban.deleted', ['entity' => 'card'])
        ]);

        $this->closeModal();
    }
}
