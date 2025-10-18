<?php

declare(strict_types=1);

namespace Prism\UI\Components\Modal;

use Illuminate\View\Component;

class ModalFooter extends Component
{
    public function render()
    {
        return view('components.prism.modal.modal-footer');
    }
}
