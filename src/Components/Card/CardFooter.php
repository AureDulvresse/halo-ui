<?php

declare(strict_types=1);

namespace Flux\UI\Components\Card;

use Illuminate\View\Component;

class CardFooter extends Component
{
    public function render()
    {
        return view('components.flux.card.card-footer');
    }
}
