<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class CardBody extends Component
{
    public function render()
    {
        return view('halo::card.body');
    }
}
