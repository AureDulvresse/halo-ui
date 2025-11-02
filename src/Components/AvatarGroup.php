<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class AvatarGroup extends Component
{
    public int $max;
    public string $size;

    public function __construct(
        int $max = 4,
        string $size = 'md'
    ) {
        $this->max = $max;
        $this->size = $size;
    }

    public function render()
    {
        return view('halo::avatar-group');
    }
}