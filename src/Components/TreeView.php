<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class TreeView extends Component
{
    public array $items;
    public bool $selectable;

    public function __construct(
        array $items = [],
        bool $selectable = false
    ) {
        $this->items = $items;
        $this->selectable = $selectable;
    }

    public function render()
    {
        return view('halo::tree-view');
    }
}