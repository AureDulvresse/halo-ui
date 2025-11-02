<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Carousel extends Component
{
    public bool $autoplay;
    public int $interval;
    public bool $showControls;
    public bool $showIndicators;

    public function __construct(
        bool $autoplay = false,
        int $interval = 3000,
        bool $showControls = true,
        bool $showIndicators = true
    ) {
        $this->autoplay = $autoplay;
        $this->interval = $interval;
        $this->showControls = $showControls;
        $this->showIndicators = $showIndicators;
    }

    public function render()
    {
        return view('halo::carousel');
    }
}
