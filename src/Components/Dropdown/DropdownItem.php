<?php

declare(strict_types=1);

namespace Flux\UI\Components\Dropdown;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    public function render()
    {
        return view('components.flux.dropdown.dropdown-item');
    }
}
