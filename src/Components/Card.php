<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public string $variant;
    public bool $padding;

    public function __construct(
        string $variant = 'default',
        bool $padding = true,
    ) {
        $this->variant = $variant;
        $this->padding = $padding;
    }

    public function render()
    {
        return view('halo::components.halo.card.index');
    }
}
