<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Spinner extends Component
{
    public string $size;
    public ?string $label;

    public function __construct(
        string $size = 'md',
        ?string $label = null,
    ) {
        $this->size = $size;
        $this->label = $label;
    }

    public function render()
    {
        return view('halo::components.halo.spinner');
    }
}
