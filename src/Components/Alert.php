<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $variant;
    public bool $dismissible;
    public ?string $icon;

    public function __construct(
        string $variant = 'info',
        bool $dismissible = false,
        ?string $icon = null,
    ) {
        $this->variant = $variant;
        $this->dismissible = $dismissible;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('halo::components.halo.alert');
    }

    public function defaultIcon(): string
    {
        return match($this->variant) {
            'info' => 'information-circle',
            'success' => 'check-circle',
            'warning' => 'exclamation-triangle',
            'danger' => 'exclamation-circle',
            default => 'information-circle',
        };
    }
}
