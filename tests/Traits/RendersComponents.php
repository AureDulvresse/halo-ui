<?php

namespace Tests\Traits;

trait RendersComponents
{
    protected function render_component($name, $data = []) 
    {
        return (string) app('blade.compiler')->render(
            "<x-halo-{$name} " . collect($data)->map(fn($value, $key) => 
                is_bool($value) ? ($value ? $key : '') : "{$key}=\"{$value}\""
            )->filter()->implode(' ') . " />"
        );
    }
}