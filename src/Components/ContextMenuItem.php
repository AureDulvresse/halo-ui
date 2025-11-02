<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class ContextMenuItem extends Component
{
    public ?string $icon;
    public ?string $shortcut;
    public bool $danger;

    public function __construct(
        ?string $icon = null,
        ?string $shortcut = null,
        bool $danger = false
    ) {
        $this->icon = $icon;
        $this->shortcut = $shortcut;
        $this->danger = $danger;
    }

    public function render()
    {
        return view('halo::context-menu.item');
    }
}