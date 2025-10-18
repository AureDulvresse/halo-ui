<?php

declare(strict_types=1);

namespace Halo\UI\Components\Popover;

use Illuminate\View\Component;

class Popover extends Component
{
    public function __construct(public $trigger = null) {}
    public function render()
    {
        return view('components.flux.popover');
    }
}
