<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class CardFooter extends Component
{
    public function render()
    {
        return view('halo::card.footer');
    }
}
