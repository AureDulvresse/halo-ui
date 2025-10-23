<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public ?string $label;
    public bool $disabled;
    public bool $error;
    public function __construct(
        ?string $label = null,
        bool $disabled = false,
        bool $error = false
    ) {
        $this->label = $label;
        $this->disabled = $disabled;
        $this->error = $error;
    }
    public function render()
    {
        return view('halo::checkbox');
    }
}
