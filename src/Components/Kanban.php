<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Kanban extends Component
{
    public array $columns;

    public function __construct(array $columns = [])
    {
        $this->columns = $columns;
    }

    public function render()
    {
        return view('halo::kanban.index');
    }
}
