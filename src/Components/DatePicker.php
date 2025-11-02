<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class DatePicker extends Component
{
    public ?string $label;
    public ?string $value;
    public ?string $min;
    public ?string $max;
    public string $format;

    public function __construct(
        ?string $label = null,
        ?string $value = null,
        ?string $min = null,
        ?string $max = null,
        string $format = 'Y-m-d'
    ) {
        $this->label = $label;
        $this->value = $value;
        $this->min = $min;
        $this->max = $max;
        $this->format = $format;
    }

    public function render()
    {
        return view('halo::date-picker');
    }
}