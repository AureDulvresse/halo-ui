<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class ColorPicker extends Component
{
    public ?string $label;
    public ?string $value;

    public function __construct(
        ?string $label = null,
        ?string $value = '#000000'
    ) {
        $this->label = $label;
        $this->value = $value;
    }

    public function render()
    {
        return view('halo::color-picker');
    }
}