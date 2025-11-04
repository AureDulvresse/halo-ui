<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public string $type;
    public string $size;
    public ?string $error;
    public ?string $label;
    public ?string $hint;
    public ?string $icon;
    public string $iconPosition;
    public bool $disabled;

    public function __construct(
        string $type = 'text',
        string $size = 'md',
        ?string $error = null,
        ?string $label = null,
        ?string $hint = null,
        ?string $icon = null,
        string $iconPosition = 'left',
        bool $disabled = false,
    ) {
        $this->type = $type;
        $this->size = $size;
        $this->error = $error;
        $this->label = $label;
        $this->hint = $hint;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('halo::components.halo.input');
    }

    public function classes(): string
    {
        $baseClasses = 'block w-full border transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:ring-blue-400 focus:border-transparent disabled:opacity-50 disabled:cursor-not-allowed dark:bg-slate-800 dark:text-white';

        $sizeClasses = halo_classes('input', null, $this->size);
        $errorClasses = $this->error ? 'border-red-300 dark:border-red-700 text-red-900 dark:text-red-300 focus:ring-red-500' : 'border-slate-300 dark:border-slate-600 text-slate-900 dark:text-slate-100';
        $iconPadding = $this->icon ? ($this->iconPosition === 'left' ? 'pl-10' : 'pr-10') : '';
        $radiusClass = theme('radius.md', 'rounded-md');

        return trim("{$baseClasses} {$sizeClasses} {$errorClasses} {$iconPadding} {$radiusClass}");
    }
}
