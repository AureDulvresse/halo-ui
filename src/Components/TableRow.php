<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class TableRow extends Component
{
    public bool $header;
    public function __construct(bool $header = false)
    {
        $this->header = $header;
    }
    public function render()
    {
        return view('halo::table.row');
    }
}
