<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public string $size;
    public string $backdrop;
    public bool $closeable;
    public bool $open;

    public function __construct(
        string $size = 'md',
        string $backdrop = 'blur',
        bool $closeable = true,
        bool $open = false,
    ) {
        $this->size = $size;
        $this->backdrop = $backdrop;
        $this->closeable = $closeable;
        $this->open = $open;
    }

    public function render()
    {
        return view('halo::components.halo.modal.index');
    }

    public function sizeClass(): string
    {
        return config("halo.sizes.modal.{$this->size}", 'max-w-lg');
    }

    public function backdropClass(): string
    {
        return $this->backdrop === 'blur' ? 'backdrop-blur-sm' : '';
    }
}
