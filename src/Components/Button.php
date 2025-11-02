<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $variant;
    public string $size;
    public string $type;
    public bool $disabled;
    public bool $loading;
    public ?string $icon;
    public ?string $iconPosition;

    public function __construct(
        string $variant = 'primary',
        string $size = 'md',
        string $type = 'button',
        bool $disabled = false,
        bool $loading = false,
        ?string $icon = null,
        ?string $iconPosition = 'left'
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->type = $type;
        $this->disabled = $disabled || $loading;
        $this->loading = $loading;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
    }

    public function render()
    {
        return view('halo::button');
    }

}
