<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Tab extends Component
{
    public ?string $default;
    public function __construct(?string $default = null)
    {
        $this->default = $default;
    }
    public function render()
    {
        return view('halo::tab.index');
    }
}
