<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class StepperItem extends Component
{
    public int $step;
    public string $title;
    public ?string $description;

    public function __construct(
        int $step,
        string $title,
        ?string $description = null
    ) {
        $this->step = $step;
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('halo::stepper.item');
    }
}