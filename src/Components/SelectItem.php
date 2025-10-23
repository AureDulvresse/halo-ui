<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class SelectItem extends Component
{
    public string $value;
    public bool $selected;
    public function __construct(
        string $value = '',
        bool $selected = false
    ) {
        $this->value = $value;
        $this->selected = $selected;
    }
    public function render()
    {
        return view('halo::select.item');
    }
}
