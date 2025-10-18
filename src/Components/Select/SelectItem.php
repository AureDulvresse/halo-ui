<?php

namespace Prism\UI\Components\Select;

use Illuminate\View\Component;

class SelectItem extends Component
{
    public string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function render()
    {
        return view('components.prism.select.select-item');
    }
}
