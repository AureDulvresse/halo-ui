<?php

namespace Flux\UI\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public string $variant = 'primary',
        public string $size = 'md'
    ) {}

    public function render()
    {
        return view('components.flux.button');
    }
}
