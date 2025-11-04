<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public ?string $label;
    public ?string $description;
    public ?string $error;
    public bool $disabled;

    public function __construct(
        ?string $label = null,
        ?string $description = null,
        ?string $error = null,
        bool $disabled = false,
    ) {
        $this->label = $label;
        $this->description = $description;
        $this->error = $error;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('halo::components.halo.checkbox');
    }
}
