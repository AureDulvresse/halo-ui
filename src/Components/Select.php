<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public ?string $label;
    public bool $error;
    public bool $disabled;
    public ?string $placeholder;
    public string $size;
    public function __construct(
        ?string $label = null,
        bool $error = false,
        bool $disabled = false,
        ?string $placeholder = 'Select an option',
        string $size = 'md'
    ) {
        $this->label = $label;
        $this->error = $error;
        $this->disabled = $disabled;
        $this->placeholder = $placeholder;
        $this->size = $size;
    }
    public function render()
    {
        return view('halo::select.index');
    }
}
