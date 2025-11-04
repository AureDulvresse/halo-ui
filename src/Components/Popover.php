<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Popover extends Component
{
    public string $position;
    public string $trigger;

    public function __construct(
        string $position = 'top',
        string $trigger = 'click'
    ) {
        $this->position = $position;
        $this->trigger = $trigger;
    }

    public function render()
    {
        return view('halo::popover');
    }
}
