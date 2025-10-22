<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class BreadcrumbItem extends Component
{
    public ?string $href;
    public bool $active;
    public ?string $icon;
    public function __construct(
        ?string $href = null,
        bool $active = false,
        ?string $icon = null
    ) {
        $this->href = $href;
        $this->active = $active;
        $this->icon = $icon;
    }
    public function render()
    {
        return view('halo::breadcrumb-item');
    }
}
