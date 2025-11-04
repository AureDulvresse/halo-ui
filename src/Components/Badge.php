<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public string $variant;
    public string $size;
    public ?string $icon;
    public bool $dot;
    public bool $removable;

    public function __construct(
        string $variant = 'primary',
        string $size = 'md',
        ?string $icon = null,
        bool $dot = false,
        bool $removable = false,
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->icon = $icon;
        $this->dot = $dot;
        $this->removable = $removable;
    }

    public function render()
    {
        return view('halo::components.halo.badge');
    }
}
