<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class Pagination extends Component
{
    public LengthAwarePaginator $paginator;
    public function __construct(LengthAwarePaginator $paginator)
    {
        $this->paginator = $paginator;
    }
    public function render()
    {
        return view('halo::pagination');
    }
}
