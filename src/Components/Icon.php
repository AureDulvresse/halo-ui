<?php

namespace Halo\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Str;
use BladeUI\Icons\Factory as IconFactory;

class Icon extends Component
{
    public string $name;
    public ?string $class;
    public bool $defer;

    public function __construct(string $name, ?string $class = null, bool $defer = false)
    {
        $this->name = Str::kebab($name);
        $this->class = $class;
        $this->defer = $defer;
    }

    public function render(): View|string
    {
        return view('halo::icon');
    }

    /**
     * Tente de récupérer le SVG depuis le package Blade Icons.
     */
    public function svg(): ?string
    {
        /** @var IconFactory $factory */
        $factory = app(IconFactory::class);

        $name = $this->name;
        $set = null;

        // Permet "lucide.camera" → set=lucide, icon=camera
        if (Str::contains($name, '.')) {
            [$set, $name] = explode('.', $name, 2);
        }

        try {
            $svg = $factory->svg($name, $set ? ['set' => $set] : []);
            if ($this->class) $svg->addClass($this->class);
            if ($this->defer) $svg->defer();
            return (string) $svg;
        } catch (\Throwable $e) {
            return null;
        }
    }
}
