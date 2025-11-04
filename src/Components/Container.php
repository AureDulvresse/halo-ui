<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Container extends Component
{
    public string $size;

    public function __construct(string $size = 'default')
    {
        $this->size = $size;
    }

    public function render()
    {
        return view('halo::components.halo.container');
    }
}
