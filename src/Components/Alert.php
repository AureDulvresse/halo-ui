<?php

declare(strict_types=1);

namespace Flux\UI\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $variant;
    
    public function __construct(string $variant = 'primary')
    {
        $this->variant = $variant;
    }
    public function render()
    {
        return view('components.flux.alert');
    }
}
