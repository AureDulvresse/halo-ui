<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Toggle extends Component
{
    public string $size;
    public bool $disabled;
    public ?string $label;

    public function __construct(
        string $size = 'md',
        bool $disabled = false,
        ?string $label = null
    ) {
        $this->size = $size;
        $this->disabled = $disabled;
        $this->label = $label;
    }

    public function render()
    {
        return view('halo::toggle');
    }
}