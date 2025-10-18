<?php

declare(strict_types=1);

namespace Flux\UI\Components\Breadcrumb;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public function render()
    {
        return view('components.flux.breadcrumb');
    }
}
