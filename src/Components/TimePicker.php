<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class TimePicker extends Component
{
    public ?string $label;
    public ?string $value;
    public string $format;

    public function __construct(
        ?string $label = null,
        ?string $value = null,
        string $format = '24h'
    ) {
        $this->label = $label;
        $this->value = $value;
        $this->format = $format;
    }

    public function render()
    {
        return view('halo::time-picker');
    }
}