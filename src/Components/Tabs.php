<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Tabs extends Component
{
    public int $defaultTab;
    public string $variant;

    public function __construct(
        int $defaultTab = 0,
        string $variant = 'line',
    ) {
        $this->defaultTab = $defaultTab;
        $this->variant = $variant;
    }

    public function render()
    {
        return view('halo::components.halo.tabs.index');
    }
}
