<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class SliderRange extends Component
{
    public int|float $min;
    public int|float $max;
    public int|float $step;
    public int|float $value;
    public ?string $label;
    public bool $showValue;

    public function __construct(
        int|float $min = 0,
        int|float $max = 100,
        int|float $step = 1,
        int|float $value = 50,
        ?string $label = null,
        bool $showValue = true
    ) {
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
        $this->value = $value;
        $this->label = $label;
        $this->showValue = $showValue;
    }

    public function render()
    {
        return view('halo::slider-range');
    }
}