<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Spinner extends Component
{
    public string $size;
    public string $color;
    public function __construct(
        string $size = 'md',
        string $color = 'blue'
    ) {
        $this->size = $size;
        $this->color = $color;
    }
    public function render()
    {
        return view('halo::spinner');
    }
}
