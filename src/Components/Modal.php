<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public string $name;
    public string $size;
    public bool $backdrop;
    public bool $static;

    public function __construct(
        string $name,
        string $size = 'md',
        bool $backdrop = true,
        bool $static = false
    ) {
        $this->name = $name;
        $this->size = $size;
        $this->backdrop = $backdrop;
        $this->static = $static;
    }

    public function render()
    {
        return view('halo::modal.index');
    }

    public function sizeClasses(): string
    {
        return match ($this->size) {
            'sm' => 'max-w-md',
            'md' => 'max-w-lg',
            'lg' => 'max-w-2xl',
            'xl' => 'max-w-4xl',
            '2xl' => 'max-w-6xl',
            'full' => 'max-w-full mx-4',
            default => 'max-w-lg',
        };
    }
}