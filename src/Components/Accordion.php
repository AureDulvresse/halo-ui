<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Accordion extends Component
{
    public bool $multiple;
    public ?string $defaultOpen;

    public function __construct(
        bool $multiple = false,
        ?string $defaultOpen = null
    ) {
        $this->multiple = $multiple;
        $this->defaultOpen = $defaultOpen;
    }

    public function render()
    {
        return view('halo::accordion.index');
    }
}