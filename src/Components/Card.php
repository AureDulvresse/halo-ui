<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public bool $padding;
    public function __construct(bool $padding = true)
    {
        $this->padding = $padding;
    }
    public function render()
    {
        return view('halo::card.index');
    }
}
