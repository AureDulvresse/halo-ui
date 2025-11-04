<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $variant;
    public string $size;
    public string $type;
    public bool $disabled;
    public ?string $icon;
    public string $iconPosition;
    public bool $loading;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $variant = 'primary',
        string $size = 'md',
        string $type = 'button',
        bool $disabled = false,
        ?string $icon = null,
        string $iconPosition = 'left',
        bool $loading = false,
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->type = $type;
        $this->disabled = $disabled;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
        $this->loading = $loading;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('halo::components.halo.button');
    }

    /**
     * Get the component classes.
     */
    public function classes(): string
    {
        $baseClasses = 'inline-flex items-center justify-center gap-2 font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed border';

        $variantClasses = halo_classes('button', $this->variant, $this->size);
        $radiusClass = theme('radius.md', 'rounded-md');

        return trim("{$baseClasses} {$variantClasses} {$radiusClass}");
    }
}
