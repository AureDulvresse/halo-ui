<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Code extends Component
{
    public ?string $language;
    public bool $showLineNumbers;
    public bool $copyable;

    public function __construct(
        ?string $language = null,
        bool $showLineNumbers = false,
        bool $copyable = true
    ) {
        $this->language = $language;
        $this->showLineNumbers = $showLineNumbers;
        $this->copyable = $copyable;
    }

    public function render()
    {
        return view('halo::code');
    }
}