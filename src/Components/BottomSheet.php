<?php 

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class BottomSheet extends Component
{
    public string $name;
    public string $height;

    public function __construct(
        string $name,
        string $height = 'auto'
    ) {
        $this->name = $name;
        $this->height = $height;
    }

    public function render()
    {
        return view('halo::bottom-sheet');
    }
}