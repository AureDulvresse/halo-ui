@props([
    'title' => config('app.name', 'Laravel'),
    'theme' => config('halo.theme.default', 'halo'),
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ $theme }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    {{ $head ?? '' }}

    @haloStyles
</head>
<body class="bg-halo-background text-halo-foreground antialiased">
    {{ $slot }}

    @haloScripts

    {{ $scripts ?? '' }}
</body>
</html>
