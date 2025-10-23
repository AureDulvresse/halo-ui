<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class TabItem extends Component
{
    public string $name;
    public string $title;
    public function __construct(
        string $name = '',
        string $title = ''
    ) {
        $this->name = $name;
        $this->title = $title;
    }
    public function render()
    {
        return view('halo::tab.item');
    }
}
