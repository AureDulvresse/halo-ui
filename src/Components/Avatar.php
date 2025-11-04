<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Avatar extends Component
{
    public ?string $src;
    public string $alt;
    public string $size;
    public ?string $initials;
    public ?string $status;

    public function __construct(
        ?string $src = null,
        string $alt = '',
        string $size = 'md',
        ?string $initials = null,
        ?string $status = null,
    ) {
        $this->src = $src;
        $this->alt = $alt;
        $this->size = $size;
        $this->initials = $initials;
        $this->status = $status;
    }

    public function render()
    {
        return view('halo::components.halo.avatar');
    }
}
