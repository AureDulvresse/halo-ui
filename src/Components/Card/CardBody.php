<?php

declare(strict_types=1);

namespace Halo\UI\Components\Card;

use Illuminate\View\Component;

class CardBody extends Component
{
    public function render()
    {
        return view('components.flux.card.card-body');
    }
}
