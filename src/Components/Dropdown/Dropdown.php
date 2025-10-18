<?php

declare(strict_types=1);

namespace Prism\UI\Components\Dropdown;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public string $label;


    public function __construct(string $label = 'Menu')
    {
        $this->label = $label;
    }


    public function render()
    {
        return view('components.prism.dropdown.dropdown');
    }
}
