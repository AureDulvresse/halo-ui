<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Tooltip extends Component
{
    public string $text;
    public string $position;
    public function __construct(
        string $text = '',
        string $position = 'top'
    ) {
        $this->text = $text;
        $this->position = $position;
    }
    public function render()
    {
        return view('halo::tooltip');
    }
}
