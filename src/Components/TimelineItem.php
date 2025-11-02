<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class TimelineItem extends Component
{
    public ?string $icon;
    public ?string $time;
    public string $variant;

    public function __construct(
        ?string $icon = null,
        ?string $time = null,
        string $variant = 'default'
    ) {
        $this->icon = $icon;
        $this->time = $time;
        $this->variant = $variant;
    }

    public function render()
    {
        return view('halo::timeline.item');
    }
}