<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $variant;
    public string $size;
    public string $type;
    public bool $disabled;
    public bool $loading;
    public ?string $icon;
    public ?string $iconPosition;

    public function __construct(
        string $variant = 'primary',
        string $size = 'md',
        string $type = 'button',
        bool $disabled = false,
        bool $loading = false,
        ?string $icon = null,
        ?string $iconPosition = 'left'
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->type = $type;
        $this->disabled = $disabled || $loading;
        $this->loading = $loading;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
    }

    public function render()
    {
        return view('halo::button');
    }

    public function variantClasses(): string
    {
        return match ($this->variant) {
            'primary' => 'bg-blue-600 hover:bg-blue-700 text-white border-transparent focus:ring-blue-500',
            'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-900 border-transparent focus:ring-gray-500',
            'success' => 'bg-green-600 hover:bg-green-700 text-white border-transparent focus:ring-green-500',
            'danger' => 'bg-red-600 hover:bg-red-700 text-white border-transparent focus:ring-red-500',
            'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white border-transparent focus:ring-yellow-500',
            'outline' => 'bg-transparent hover:bg-gray-50 text-gray-700 border-gray-300 focus:ring-blue-500',
            'ghost' => 'bg-transparent hover:bg-gray-100 text-gray-700 border-transparent focus:ring-gray-500',
            'link' => 'bg-transparent hover:underline text-blue-600 border-transparent focus:ring-blue-500 px-0',
            default => 'bg-blue-600 hover:bg-blue-700 text-white border-transparent focus:ring-blue-500',
        };
    }

    public function sizeClasses(): string
    {
        return match ($this->size) {
            'xs' => 'px-2.5 py-1.5 text-xs',
            'sm' => 'px-3 py-2 text-sm',
            'md' => 'px-4 py-2.5 text-base',
            'lg' => 'px-5 py-3 text-lg',
            'xl' => 'px-6 py-3.5 text-xl',
            default => 'px-4 py-2.5 text-base',
        };
    }

    public function baseClasses(): string
    {
        return 'inline-flex items-center justify-center font-medium border rounded-md transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
    }
}
