<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Divider extends Component
{
    public ?string $label;
    public string $position;
    public string $variant;

    public function __construct(
        ?string $label = null,
        string $position = 'center',
        string $variant = 'default'
    ) {
        $this->label = $label;
        $this->position = $position;
        $this->variant = $variant;
    }

    public function render()
    {
        return view('halo::divider');
    }
}