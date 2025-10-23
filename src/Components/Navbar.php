<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public bool $fixed;
    public bool $transparent;
    public function __construct(
        bool $fixed = false,
        bool $transparent = false
    ) {
        $this->fixed = $fixed;
        $this->transparent = $transparent;
    }
    public function render()
    {
        return view('halo::navbar');
    }
}
