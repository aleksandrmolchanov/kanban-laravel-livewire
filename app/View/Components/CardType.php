<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardType extends Component
{
    /**
     * The type.
     *
     * @var int
     */
    public int $type;

    /**
     * Create a new component instance.
     *
     * @param  int  $type
     * @return void
     */
    public function __construct(int $type)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-type');
    }
}
