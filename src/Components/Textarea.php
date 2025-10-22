<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public int $rows;
    public bool $error;
    public bool $disabled;
    public ?string $label;
    public ?string $hint;
    public ?string $errorMessage;
    public function __construct(
        int $rows = 3,
        bool $error = false,
        bool $disabled = false,
        ?string $label = null,
        ?string $hint = null,
        ?string $errorMessage = null
    ) {
        $this->rows = $rows;
        $this->error = $error;
        $this->disabled = $disabled;
        $this->label = $label;
        $this->hint = $hint;
        $this->errorMessage = $errorMessage;
    }
    public function render()
    {
        return view('halo::textarea');
    }
}
