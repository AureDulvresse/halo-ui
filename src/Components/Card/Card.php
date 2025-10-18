<?php

declare(strict_types=1);

namespace Flux\UI\Components\Card;

use Illuminate\View\Component;

class Card extends Component
{
    public string $padding;


    public function __construct(string $padding = 'p-4')
    {
        $this->padding = $padding;
    }


    public function render()
    {
        return view('components.flux.card.card');
    }
}
