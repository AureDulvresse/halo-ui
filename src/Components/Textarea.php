<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public ?string $label;
    public ?string $error;
    public ?string $hint;
    public int $rows;
    public bool $disabled;
    public string $resize;

    public function __construct(
        ?string $label = null,
        ?string $error = null,
        ?string $hint = null,
        int $rows = 4,
        bool $disabled = false,
        string $resize = 'vertical',
    ) {
        $this->label = $label;
        $this->error = $error;
        $this->hint = $hint;
        $this->rows = $rows;
        $this->disabled = $disabled;
        $this->resize = $resize;
    }

    public function render()
    {
        return view('halo::components.halo.textarea');
    }
}
