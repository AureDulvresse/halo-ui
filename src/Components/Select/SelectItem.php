<?php

namespace Halo\UI\Components\Select;

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
        return view('components.flux.select.select-item');
    }
}
