<?php

it('defines a token block for every available theme', function () {
    $css = file_get_contents(__DIR__.'/../resources/css/theme.css');

    foreach (config('halo.theme.available') as $theme) {
        expect($css)->toContain("[data-theme='{$theme}']");
    }
});

it('keeps the default theme in sync between config and CSS', function () {
    $css = file_get_contents(__DIR__.'/../resources/css/theme.css');
    $default = config('halo.theme.default');

    expect($css)->toContain("[data-theme='{$default}']")
        ->and(config('halo.theme.available'))->toContain($default);
});
