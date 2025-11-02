<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class RichText extends Component
{
    public ?string $label;
    public ?string $value;
    public array $toolbar;

    public function __construct(
        ?string $label = null,
        ?string $value = null,
        array $toolbar = ['bold', 'italic', 'underline', 'link']
    ) {
        $this->label = $label;
        $this->value = $value;
        $this->toolbar = $toolbar;
    }

    public function render()
    {
        return view('halo::rich-text');
    }
}