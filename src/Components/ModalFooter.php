<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class ModalFooter extends Component
{
    public function render()
    {
        return view('halo::modal.footer');
    }
}
