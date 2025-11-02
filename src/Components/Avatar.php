<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Avatar extends Component
{
    public string $size;
    public ?string $src;
    public ?string $alt;
    public ?string $fallback;
    public string $shape;

    public function __construct(
        string $size = 'md',
        ?string $src = null,
        ?string $alt = null,
        ?string $fallback = null,
        string $shape = 'circle'
    ) {
        $this->size = $size;
        $this->src = $src;
        $this->alt = $alt ?? 'Avatar';
        $this->fallback = $fallback;
        $this->shape = $shape;
    }

    public function render()
    {
        return view('halo::avatar');
    }

    public function getInitials(): string
    {
        if (!$this->fallback) {
            return '?';
        }

        $words = explode(' ', $this->fallback);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        }

        return strtoupper(substr($this->fallback, 0, 2));
    }
}