<?php

declare(strict_types=1);

namespace Halo\UI\Components\Modal;

use Illuminate\View\Component;

class ModalBody extends Component
{

    public function render()
    {
        return view('components.halo.modal.modal-body');
    }
}
