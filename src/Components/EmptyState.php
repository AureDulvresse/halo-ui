<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class EmptyState extends Component
{
    public ?string $icon;
    public string $title;
    public ?string $description;

    public function __construct(
        ?string $icon = null,
        string $title = 'No data',
        ?string $description = null
    ) {
        $this->icon = $icon;
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('halo::empty-state');
    }
}