<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class CommandPalette extends Component
{
    public string $placeholder;

    public function __construct(string $placeholder = 'Type a command or search...')
    {
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('halo::command-palette');
    }
}