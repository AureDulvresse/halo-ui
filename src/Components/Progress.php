<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Progress extends Component
{
    public int|float $value;
    public int|float $max;
    public string $size;
    public string $variant;
    public bool $showLabel;
    public bool $striped;
    public bool $animated;

    public function __construct(
        int|float $value = 0,
        int|float $max = 100,
        string $size = 'md',
        string $variant = 'primary',
        bool $showLabel = false,
        bool $striped = false,
        bool $animated = false
    ) {
        $this->value = $value;
        $this->max = $max;
        $this->size = $size;
        $this->variant = $variant;
        $this->showLabel = $showLabel;
        $this->striped = $striped;
        $this->animated = $animated;
    }

    public function render()
    {
        return view('halo::progress');
    }

    public function percentage(): int
    {
        if ($this->max <= 0) {
            return 0;
        }

        return (int) min(100, ($this->value / $this->max) * 100);
    }
}