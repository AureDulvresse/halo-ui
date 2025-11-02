<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>HaloUI Demo</title>
    <script src="/vendor/halo-ui/js/init.js" defer></script>
    <link href="/vendor/halo-ui/css/halo.css" rel="stylesheet">
</head>

<body class="p-8">
    <h1 class="text-2xl font-bold mb-4">HaloUI Demo</h1>

    <x-halo::button variant="primary" icon="check">Save</x-halo::button>

    <div x-data="HaloUI.modal()" class="mt-6">
        <button @click="openModal" class="underline">Open Modal</button>
        <div x-show="open" class="fixed inset-0 flex items-center justify-center">
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-lg font-semibold">Example Modal</h2>
                <p class="mt-2">Hello world</p>
                <button @click="close" class="mt-4">Close</button>
            </div>
        </div>
    </div>

</body>

</html>
