<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Timeline extends Component
{
    public string $position;

    public function __construct(string $position = 'left')
    {
        $this->position = $position;
    }

    public function render()
    {
        return view('halo::timeline.index');
    }
}