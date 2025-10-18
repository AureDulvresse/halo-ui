<?php

declare(strict_types=1);

namespace Halo\UI\Components\Breadcrumb;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public function render()
    {
        return view('components.halo.breadcrumb');
    }
}
