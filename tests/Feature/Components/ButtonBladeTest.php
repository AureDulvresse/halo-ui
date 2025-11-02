<?php

it('the resources button blade exists and contains a button or link element and Tailwind classes', function () {
    $file = __DIR__ . '/../../../resources/views/components/halo/button.blade.php';

    expect(file_exists($file))->toBeTrue();

    $content = file_get_contents($file);

    // élément button ou a présent
    expect(stripos($content, '<button') !== false || stripos($content, '<a') !== false)->toBeTrue();

    // présence probable de classes tailwind (ex: px-, py-, rounded, inline-flex)
    $hasTailwindStatic = preg_match('/class\s*=\s*"[^"]*(px-|py-|rounded|inline-flex|flex|grid)[^"]*"/i', $content) === 1;

    // ou présence d'un merge dynamique via $attributes->merge ou d'un helper ComponentHelper (pattern recommandé)
    $hasDynamic = stripos($content, '$attributes->merge') !== false || stripos($content, 'ComponentHelper::') !== false || stripos($content, 'ComponentHelper') !== false;

    expect($hasTailwindStatic || $hasDynamic)->toBeTrue();
});
