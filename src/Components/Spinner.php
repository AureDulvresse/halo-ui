<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Spinner extends Component
{
    public function render()
    {
        return view('components.flux.spinner');
    }
}
