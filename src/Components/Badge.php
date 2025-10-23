<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public string $variant;
    public string $size;
    public bool $dot;
    public function __construct(
        string $variant = 'primary',
        string $size = 'md',
        bool $dot = false
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->dot = $dot;
    }
    public function render()
    {
        return view('halo::badge');
    }
}
