<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class KanbanColumn extends Component
{
    public string $title;
    public ?string $color;
    public ?int $count;

    public function __construct(
        string $title,
        ?string $color = null,
        ?int $count = null
    ) {
        $this->title = $title;
        $this->color = $color;
        $this->count = $count;
    }

    public function render()
    {
        return view('halo::kanban.column');
    }
}