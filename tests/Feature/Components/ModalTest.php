<?php

use Illuminate\Support\Facades\Blade;

it('renders modal component structure', function () {
    $html = Blade::render("<x-halo::modal id=\"m1\"> <x-slot name=\"title\">Hi</x-slot> </x-halo::modal>");
    expect($html)->toContain('Hi');
});
