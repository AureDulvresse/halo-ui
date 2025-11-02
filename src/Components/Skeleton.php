<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Skeleton extends Component
{
    public string $variant;
    public ?string $width;
    public ?string $height;
    public bool $animated;

    public function __construct(
        string $variant = 'text',
        ?string $width = null,
        ?string $height = null,
        bool $animated = true
    ) {
        $this->variant = $variant;
        $this->width = $width;
        $this->height = $height;
        $this->animated = $animated;
    }

    public function render()
    {
        return view('halo::skeleton');
    }
}