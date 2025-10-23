<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Toast extends Component
{
    public string $position;
    public int $duration;
    public function __construct(
        ?string $position = null,
        ?int $duration = null
    ) {
        $this->position = $position ?? config('halo.toast.position', 'top-right');
        $this->duration = $duration ?? config('halo.toast.duration', 3000);
    }
    public function render()
    {
        return view('halo::toast');
    }
}
