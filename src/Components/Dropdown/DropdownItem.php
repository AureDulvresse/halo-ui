<?php

declare(strict_types=1);

namespace Prism\UI\Components\Dropdown;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    public function render()
    {
        return view('components.prism.dropdown.dropdown-item');
    }
}
