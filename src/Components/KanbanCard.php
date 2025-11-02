<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class KanbanCard extends Component
{
    public ?string $title;
    public ?string $description;

    public function __construct(
        ?string $title = null,
        ?string $description = null
    ) {
        $this->title = $title;
        $this->description = $description;
    }

    public function render()
    {
        return view('halo::kanban.card');
    }
}