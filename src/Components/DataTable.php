<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public array $columns;
    public $data;
    public bool $sortable;
    public bool $searchable;
    public bool $selectable;
    public bool $paginated;
    public int $perPage;
    public bool $exportable;
    public array $actions;

    public function __construct(
        array $columns = [],
        $data = [],
        bool $sortable = true,
        bool $searchable = true,
        bool $selectable = false,
        bool $paginated = true,
        int $perPage = 10,
        bool $exportable = false,
        array $actions = [],
    ) {
        $this->columns = $columns;
        $this->data = $data;
        $this->sortable = $sortable;
        $this->searchable = $searchable;
        $this->selectable = $selectable;
        $this->paginated = $paginated;
        $this->perPage = $perPage;
        $this->exportable = $exportable;
        $this->actions = $actions;
    }

    public function render()
    {
        return view('halo::components.halo.datatable');
    }
}
