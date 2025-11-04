<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    public ?string $href;
    public ?string $icon;
    public bool $destructive;

    public function __construct(
        ?string $href = null,
        ?string $icon = null,
        bool $destructive = false,
    ) {
        $this->href = $href;
        $this->icon = $icon;
        $this->destructive = $destructive;
    }

    public function render()
    {
        return view('halo::components.halo.dropdown.item');
    }
}
