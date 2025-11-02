<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Notification extends Component
{
    public string $variant;
    public ?string $title;
    public bool $dismissible;
    public ?string $icon;

    public function __construct(
        string $variant = 'info',
        ?string $title = null,
        bool $dismissible = true,
        ?string $icon = null
    ) {
        $this->variant = $variant;
        $this->title = $title;
        $this->dismissible = $dismissible;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('halo::notification');
    }
}