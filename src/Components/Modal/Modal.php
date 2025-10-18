<?php

declare(strict_types=1);

namespace Prism\UI\Components\Modal;

use Illuminate\View\Component;

class Modal extends Component
{
    public bool $show;

    public function __construct(bool $show = false)
    {
        $this->show = $show;
    }

    public function render()
    {
        return view('components.prism.modal.modal');
    }
}
