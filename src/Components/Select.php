<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public ?string $label;
    public ?string $error;
    public ?string $hint;
    public string $size;
    public bool $disabled;
    public ?string $placeholder;

    public function __construct(
        ?string $label = null,
        ?string $error = null,
        ?string $hint = null,
        string $size = 'md',
        bool $disabled = false,
        ?string $placeholder = null,
    ) {
        $this->label = $label;
        $this->error = $error;
        $this->hint = $hint;
        $this->size = $size;
        $this->disabled = $disabled;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('halo::components.halo.select');
    }
}
