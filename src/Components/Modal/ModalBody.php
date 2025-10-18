<?php

declare(strict_types=1);

namespace Flux\UI\Components\Modal;

use Illuminate\View\Component;

class ModalBody extends Component
{

    public function render()
    {
        return view('components.flux.modal.modal-body');
    }
}
