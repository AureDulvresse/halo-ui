<?php

declare(strict_types=1);

namespace Halo\UI\Components\Dropdown;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    public function render()
    {
        return view('components.halo.dropdown.dropdown-item');
    }
}
