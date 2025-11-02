<?php

use Tests\TestCase;

uses(TestCase::class)->in('Feature', 'Unit');

function render_component($name, $data = [])
{
    return test()->renderComponent($name, $data);
}

// Helpers pour les tests
function assertHasClass($html, $class)
{
    test()->assertStringContainsString($class, $html);
}

function assertComponentRenders($expected, $template, $data = [])
{
    $blade = test()->blade($template, $data);

    test()->assertSame(
        trim($expected),
        trim($blade)
    );
}
