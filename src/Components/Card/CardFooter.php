<?php

declare(strict_types=1);

namespace Prism\UI\Components\Card;

use Illuminate\View\Component;

class CardFooter extends Component
{
    public function render()
    {
        return view('components.prism.card.card-footer');
    }
}
