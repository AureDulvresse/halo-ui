<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Kbd extends Component
{
    public string $size;

    public function __construct(string $size = 'md')
    {
        $this->size = $size;
    }

    public function render()
    {
        return view('halo::kbd');
    }
}
