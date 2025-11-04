<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Progress extends Component
{
    public float $value;
    public float $max;
    public string $size;
    public string $variant;
    public ?string $label;
    public bool $showValue;

    public function __construct(
        float $value = 0,
        float $max = 100,
        string $size = 'md',
        string $variant = 'primary',
        ?string $label = null,
        bool $showValue = false,
    ) {
        $this->value = $value;
        $this->max = $max;
        $this->size = $size;
        $this->variant = $variant;
        $this->label = $label;
        $this->showValue = $showValue;
    }

    public function render()
    {
        return view('halo::components.halo.progress');
    }

    public function percentage(): float
    {
        return min(100, max(0, ($this->value / $this->max) * 100));
    }
}   
