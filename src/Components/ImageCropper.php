<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class ImageCropper extends Component
{
    public string $aspectRatio;
    public ?int $width;
    public ?int $height;

    public function __construct(
        string $aspectRatio = '1:1',
        ?int $width = null,
        ?int $height = null
    ) {
        $this->aspectRatio = $aspectRatio;
        $this->width = $width;
        $this->height = $height;
    }

    public function render()
    {
        return view('halo::image-cropper');
    }
}