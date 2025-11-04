<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Divider extends Component
{
    public string $orientation;
    public ?string $text;

    public function __construct(
        string $orientation = 'horizontal',
        ?string $text = null,
    ) {
        $this->orientation = $orientation;
        $this->text = $text;
    }

    public function render()
    {
        return view('halo::components.halo.divider');
    }
}
