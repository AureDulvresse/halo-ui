<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public string $variant;

    public function __construct(string $variant = 'primary')
    {
        $this->variant = $variant;
    }
    public function render()
    {
        return view('components.halo.badge');
    }
}
