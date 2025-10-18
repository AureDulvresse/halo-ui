<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public string $size;
    public string $placeholder;

    public function __construct(string $size = 'md', string $placeholder = '')
    {
        $this->size = $size;
        $this->placeholder = $placeholder;
    }
    public function render()
    {
        return view('components.flux.textarea');
    }
}
