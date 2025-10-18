<?php

declare(strict_types=1);

namespace Prism\UI\Components\Breadcrumb;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public function render()
    {
        return view('components.prism.breadcrumb');
    }
}
