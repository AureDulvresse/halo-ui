<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    public string $name;
    public string $size;
    public string $type;
    public ?string $color;

    public function __construct(
        string $name,
        string $size = 'md',
        string $type = 'heroicon-o',
        ?string $color = null
    ) {
        $this->name = $name;
        $this->size = $size;
        $this->type = $type ?? config('halo.design.icons.default_set', 'heroicon-o');
        $this->color = $color;
    }

    public function render()
    {
        return view('halo::icon', [
            'name' => $this->name,
            'size' => $this->size,
            'type' => $this->type,
            'color' => $this->color,
            'sizeClasses' => $this->sizeClasses(),
            'colorClasses' => $this->colorClasses(),
            'componentName' => $this->componentName(),
            'hasBladeIcons' => $this->hasBladeIcons(),
        ]);
    }

    public function sizeClasses(): string
    {
        return match($this->size) {
            'xs' => 'w-3 h-3',
            'sm' => 'w-4 h-4',
            'md' => 'w-5 h-5',
            'lg' => 'w-6 h-6',
            'xl' => 'w-8 h-8',
            '2xl' => 'w-10 h-10',
            default => 'w-5 h-5',
        };
    }

    public function colorClasses(): string
    {
        if (!$this->color) {
            return 'text-current';
        }

        return match($this->color) {
            'primary' => 'text-blue-600',
            'secondary' => 'text-gray-600',
            'success' => 'text-emerald-600',
            'danger' => 'text-red-600',
            'warning' => 'text-amber-600',
            'info' => 'text-cyan-600',
            default => "text-{$this->color}",
        };
    }

    public function hasBladeIcons(): bool
    {
        return class_exists(\BladeUI\Icons\BladeIconsServiceProvider::class);
    }

    public function componentName(): string
    {
        return "{$this->type}-{$this->name}";
    }
}