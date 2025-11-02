<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class AccordionItem extends Component
{
    public string $name;
    public string $title;

    public function __construct(
        string $name,
        string $title
    ) {
        $this->name = $name;
        $this->title = $title;
    }

    public function render()
    {
        return view('halo::accordion.item');
    }
}