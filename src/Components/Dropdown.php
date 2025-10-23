<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public string $align;
    public string $width;
    public function __construct(
        string $align = 'left',
        string $width = 'w-48'
    ) {
        $this->align = $align;
        $this->width = $width;
    }
    public function render()
    {
        return view('halo::dropdown.index');
    }
}
