<?php 

namespace Halo\UI\Components;

use Illuminate\View\Component;

class FileUpload extends Component
{
    public ?string $label;
    public bool $multiple;
    public ?string $accept;
    public ?string $hint;
    public bool $error;
    public ?string $errorMessage;

    public function __construct(
        ?string $label = null,
        bool $multiple = false,
        ?string $accept = null,
        ?string $hint = null,
        bool $error = false,
        ?string $errorMessage = null
    ) {
        $this->label = $label;
        $this->multiple = $multiple;
        $this->accept = $accept;
        $this->hint = $hint;
        $this->error = $error;
        $this->errorMessage = $errorMessage;
    }

    public function render()
    {
        return view('halo::file-upload');
    }
}