<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public string $width;
    public bool $collapsible;
    public function __construct(
        string $width = 'w-64',
        bool $collapsible = false
    ) {
        $this->width = $width;
        $this->collapsible = $collapsible;
    }
    public function render()
    {
        return view('halo::sidebar');
    }
}
