<?php

declare(strict_types=1);

namespace Flux\UI\Components\Breadcrumb;

use Illuminate\View\Component;

class BreadcrumbItem extends Component
{
    public string $label;
    
    public function __construct(string $label)
    {
        $this->label = $label;
    }
    public function render()
    {
        return view('components.flux.breadcrumb-item');
    }
}
