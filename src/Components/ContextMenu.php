<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class ContextMenu extends Component
{
    public function render()
    {
        return view('halo::context-menu.index');
    }
}
