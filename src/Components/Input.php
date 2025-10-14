<?php

namespace Flux\UI\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public ?string $modelValue = null,
        public string $size = 'md'
    ) {}

    public function render()
    {
        return view('components.flux.input');
    }
}
