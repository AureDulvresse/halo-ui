<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Stats extends Component
{
    public string $value;
    public string $label;
    public ?string $change;
    public ?string $icon;
    public string $variant;

    public function __construct(
        string $value,
        string $label,
        ?string $change = null,
        ?string $icon = null,
        string $variant = 'default'
    ) {
        $this->value = $value;
        $this->label = $label;
        $this->change = $change;
        $this->icon = $icon;
        $this->variant = $variant;
    }

    public function render()
    {
        return view('halo::stats');
    }
}