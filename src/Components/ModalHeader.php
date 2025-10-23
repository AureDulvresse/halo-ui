<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class ModalHeader extends Component
{
    public bool $closeable;
    public function __construct(bool $closeable = true)
    {
        $this->closeable = $closeable;
    }
    public function render()
    {
        return view('halo::modal.header');
    }
}
