<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $variant;
    public bool $dismissible;
    public ?string $title;
    public function __construct(
        string $variant = 'info',
        bool $dismissible = false,
        ?string $title = null
    ) {
        $this->variant = $variant;
        $this->dismissible = $dismissible;
        $this->title = $title;
    }
    public function render()
    {
        return view('halo::alert');
    }
}
