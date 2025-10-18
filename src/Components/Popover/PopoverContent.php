<?php

declare(strict_types=1);

namespace Halo\UI\Components\Popover;

use Illuminate\View\Component;

class PopoverContent extends Component
{
    public string $content;
    public function __construct(string $content)
    {
        $this->content = $content;
    }
    public function render()
    {
        return view('components.halo.popover-content');
    }
}
