<?php

declare(strict_types=1);

namespace Prism\UI\Components;

use Illuminate\View\Component;

class Spinner extends Component
{
    public function render()
    {
        return view('components.prism.spinner');
    }
}
