<?php

use Illuminate\Support\Facades\Blade;

it('renders the button component with text', function () {
    $html = Blade::render("<x-halo::button>Click</x-halo::button>");
    expect($html)->toContain('Click');
});
