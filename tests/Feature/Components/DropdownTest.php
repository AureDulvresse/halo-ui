<?php

use Illuminate\Support\Facades\Blade;

it('renders dropdown trigger', function () {
    $html = Blade::render("<x-halo::dropdown> <x-slot name=\"trigger\">T</x-slot> </x-halo::dropdown>");
    expect($html)->toContain('T');
});
