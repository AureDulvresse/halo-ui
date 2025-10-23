<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    public ?string $href;
    public ?string $icon;
    public function __construct(
        ?string $href = null,
        ?string $icon = null
    ) {
        $this->href = $href;
        $this->icon = $icon;
    }
    public function render()
    {
        return view('halo::dropdown.item');
    }
}
