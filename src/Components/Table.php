<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public bool $striped;
    public bool $hoverable;
    public function __construct(
        bool $striped = false,
        bool $hoverable = true
    ) {
        $this->striped = $striped;
        $this->hoverable = $hoverable;
    }
    public function render()
    {
        return view('halo::table.index');
    }
}
