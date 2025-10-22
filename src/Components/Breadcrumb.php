<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public string $separator;
    public function __construct(string $separator = '/')
    {
        $this->separator = $separator;
    }
    public function render()
    {
        return view('halo::breadcrumb');
    }
}
