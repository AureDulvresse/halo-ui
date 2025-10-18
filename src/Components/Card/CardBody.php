<?php

declare(strict_types=1);

namespace Prism\UI\Components\Card;

use Illuminate\View\Component;

class CardBody extends Component
{
    public function render()
    {
        return view('components.prism.card.card-body');
    }
}
