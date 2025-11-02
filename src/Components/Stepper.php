<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Stepper extends Component
{
    public int $steps;
    public int $current;

    public function __construct(
        int $steps = 3,
        int $current = 1
    ) {
        $this->steps = $steps;
        $this->current = $current;
    }

    public function render()
    {
        return view('halo::stepper.index');
    }
}
