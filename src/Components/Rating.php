<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Rating extends Component
{
    public int|float $value;
    public int $max;
    public string $size;
    public bool $readonly;
    public bool $showValue;

    public function __construct(
        int|float $value = 0,
        int $max = 5,
        string $size = 'md',
        bool $readonly = false,
        bool $showValue = false
    ) {
        $this->value = $value;
        $this->max = $max;
        $this->size = $size;
        $this->readonly = $readonly;
        $this->showValue = $showValue;
    }

    public function render()
    {
        return view('halo::rating');
    }
}