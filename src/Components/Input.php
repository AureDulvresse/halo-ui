<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public string $type;
    public string $size;
    public bool $error;
    public bool $disabled;
    public ?string $label;
    public ?string $hint;
    public ?string $errorMessage;
    public function __construct(
        string $type = 'text',
        string $size = 'md',
        bool $error = false,
        bool $disabled = false,
        ?string $label = null,
        ?string $hint = null,
        ?string $errorMessage = null
    ) {
        $this->type = $type;
        $this->size = $size;
        $this->error = $error;
        $this->disabled = $disabled;
        $this->label = $label;
        $this->hint = $hint;
        $this->errorMessage = $errorMessage;
    }
    public function render()
    {
        return view('halo::input');
    }
}
