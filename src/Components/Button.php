<?php

namespace Flux\UI\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $variant;
    public string $size;

    public function __construct(string $variant = 'primary', string $size = 'md')
    {
        $this->variant = $variant;
        $this->size = $size;
    }

    public function render()
    {
        return view('components.flux.button');
    }
}
