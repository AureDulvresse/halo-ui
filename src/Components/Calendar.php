<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Calendar extends Component
{
    public ?string $value;
    public ?string $min;
    public ?string $max;

    public function __construct(
        ?string $value = null,
        ?string $min = null,
        ?string $max = null
    ) {
        $this->value = $value;
        $this->min = $min;
        $this->max = $max;
    }

    public function render()
    {
        return view('halo::calendar');
    }
}