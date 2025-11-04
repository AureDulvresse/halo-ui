<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class TabItem extends Component
{
    public int $index;
    public ?string $icon;

    public function __construct(
        int $index = 0,
        ?string $icon = null,
    ) {
        $this->index = $index;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('halo::components.halo.tabs.item');
    }
}
