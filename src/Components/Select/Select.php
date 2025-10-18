<?php

namespace Prism\UI\Components\Select;

use Illuminate\View\Component;

class Select extends Component
{
    public string $placeholder;

    public function __construct(string $placeholder = 'Select...')
    {
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.prism.select.select');
    }
}
