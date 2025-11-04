<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class SwitchComponent extends Component
{
    public ?string $label;
    public ?string $description;
    public bool $disabled;

    public function __construct(
        ?string $label = null,
        ?string $description = null,
        bool $disabled = false,
    ) {
        $this->label = $label;
        $this->description = $description;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('halo::components.halo.switch');
    }
}
