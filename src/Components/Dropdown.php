<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public string $align;
    public string $width;

    public function __construct(
        string $align = 'left',
        string $width = '48',
    ) {
        $this->align = $align;
        $this->width = $width;
    }

    public function render()
    {
        return view('halo::components.halo.dropdown.index');
    }
}
