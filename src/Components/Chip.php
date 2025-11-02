<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Chip extends Component
{
    public string $variant;
    public string $size;
    public bool $removable;
    public ?string $avatar;

    public function __construct(
        string $variant = 'default',
        string $size = 'md',
        bool $removable = false,
        ?string $avatar = null
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->removable = $removable;
        $this->avatar = $avatar;
    }

    public function render()
    {
        return view('halo::chip');
    }
}