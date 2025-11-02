<?php

it('the stub button exists and exposes props or slot markers', function () {
    $file = __DIR__ . '/../../../stubs/components/button.blade.php';

    expect(file_exists($file))->toBeTrue();

    $content = file_get_contents($file);

    // On attend au moins @props ou {{ $slot }} ou une balise button
    $hasProps = stripos($content, '@props') !== false;
    $hasSlot = stripos($content, '{{ $slot') !== false || stripos($content, '{{\$slot') !== false;
    $hasButton = stripos($content, '<button') !== false || stripos($content, '<a') !== false;

    expect($hasProps || $hasSlot || $hasButton)->toBeTrue();
});
