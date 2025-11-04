<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HaloUI v3.0.0 Demo</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-50 antialiased">
    <div class="min-h-screen">
        <!-- Navbar -->
        <nav class="bg-white border-b border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-linear-to-br from-blue-500 to-cyan-500 rounded-lg"></div>
                        <span class="text-xl font-bold text-slate-900">HaloUI</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-halo::button variant="ghost" size="sm">
                            Documentation
                        </x-halo::button>

                        <x-halo::button variant="primary" size="sm">
                            Get Started
                        </x-halo::button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-5xl font-bold text-slate-900 mb-4">
                    Welcome to <span class="text-transparent bg-clip-text bg-linear-to-r from-blue-600 to-cyan-600">HaloUI</span>
                </h1>
                <p class="text-xl text-slate-600 mb-8">
                    Modern, composable Blade components for Laravel
                </p>

                <div class="flex justify-center gap-4">
                    <x-halo::button variant="primary" size="lg" icon="rocket">
                        Explore Components
                    </x-halo::button>
                    <x-halo::button variant="outline" size="lg" icon="book">
                        Read Docs
                    </x-halo::button>
                </div>
            </div>
        </div>

        <!-- Component Showcase -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">

            <!-- Buttons -->
            <section>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Buttons</h2>
                <div class="flex flex-wrap gap-4">
                    <x-halo::button variant="primary">Primary</x-halo::button>
                    <x-halo::button variant="secondary">Secondary</x-halo::button>
                    <x-halo::button variant="outline">Outline</x-halo::button>
                    <x-halo::button variant="ghost">Ghost</x-halo::button>
                    <x-halo::button variant="danger">Danger</x-halo::button>
                    <x-halo::button variant="success">Success</x-halo::button>
                    <x-halo::button variant="primary" :loading="true">Loading</x-halo::button>
                </div>
            </section>

            <!-- Alerts -->
            <section>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Alerts</h2>
                <div class="space-y-4">
                    <x-halo::alert variant="info" dismissible>
                        <strong>Info:</strong> This is an informational message.
                    </x-halo::alert>

                    <x-halo::alert variant="success" dismissible>
                        <strong>Success:</strong> Your changes have been saved!
                    </x-halo::alert>

                    <x-halo::alert variant="warning">
                        <strong>Warning:</strong> Please review your settings.
                    </x-halo::alert>

                    <x-halo::alert variant="danger">
                        <strong>Error:</strong> Something went wrong.
                    </x-halo::alert>
                </div>
            </section>

            <!-- Cards -->
            <section>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Cards</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <x-halo::card>
                        <x-halo::card.header>
                            <h3 class="text-lg font-semibold">Card Title</h3>
                        </x-halo::card.header>
                        <x-halo::card.body>
                            <p class="text-slate-600">This is a basic card with header, body, and footer.</p>
                        </x-halo::card.body>
                        <x-halo::card.footer>
                            <x-halo::button size="sm">Action</x-halo::button>
                        </x-halo::card.footer>
                    </x-halo::card>

                    <x-halo::card variant="elevated">
                        <x-halo::card.header>
                            <h3 class="text-lg font-semibold">Elevated Card</h3>
                        </x-halo::card.header>
                        <x-halo::card.body>
                            <p class="text-slate-600">This card has more shadow depth.</p>
                        </x-halo::card.body>
                    </x-halo::card>

                    <x-halo::card variant="flat">
                        <x-halo::card.header>
                            <h3 class="text-lg font-semibold">Flat Card</h3>
                        </x-halo::card.header>
                        <x-halo::card.body>
                            <p class="text-slate-600">This card has no shadow.</p>
                        </x-halo::card.body>
                    </x-halo::card>
                </div>
            </section>

            <!-- Form Elements -->
            <section>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Form Elements</h2>
                <div class="max-w-md space-y-4">
                    <x-halo::input
                        label="Email"
                        type="email"
                        icon="mail"
                        placeholder="you@example.com"
                        hint="We'll never share your email"
                    />

                    <x-halo::input
                        label="Password"
                        type="password"
                        icon="lock"
                        placeholder="Enter password"
                    />

                    <x-halo::checkbox
                        label="Remember me"
                        description="Keep me logged in for 30 days"
                    />
                </div>
            </section>

            <!-- Badges -->
            <section>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Badges</h2>
                <div class="flex flex-wrap gap-2">
                    <x-halo::badge variant="primary">Primary</x-halo::badge>
                    <x-halo::badge variant="secondary">Secondary</x-halo::badge>
                    <x-halo::badge variant="success" icon="check">Success</x-halo::badge>
                    <x-halo::badge variant="danger" :dot="true">Danger</x-halo::badge>
                    <x-halo::badge variant="primary" :removable="true">Removable</x-halo::badge>
                </div>
            </section>

            <!-- Avatars -->
            <section>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Avatars</h2>
                <div class="flex items-center gap-4">
                    <x-halo::avatar size="xs" initials="JD" />
                    <x-halo::avatar size="sm" initials="SM" status="online" />
                    <x-halo::avatar size="md" initials="AB" status="busy" />
                    <x-halo::avatar size="lg" initials="CD" status="away" />
                    <x-halo::avatar size="xl" initials="EF" />
                </div>
            </section>

            <!-- Modal Demo -->
            <section x-data="{ showModal: false }">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Modal</h2>
                <x-halo::button @click="showModal = true">
                    Open Modal
                </x-halo::button>

                <div x-show="showModal" x-cloak>
                    <x-halo::modal size="md">
                        <x-halo::modal.header>
                            Confirm Your Action
                        </x-halo::modal.header>

                        <x-halo::modal.body>
                            <p class="text-slate-600">
                                Are you sure you want to proceed with this action? This cannot be undone.
                            </p>
                        </x-halo::modal.body>

                        <x-halo::modal.footer>
                            <x-halo::button variant="ghost" @click="showModal = false">
                                Cancel
                            </x-halo::button>
                            <x-halo::button variant="danger">
                                Confirm
                            </x-halo::button>
                        </x-halo::modal.footer>
                    </x-halo::modal>
                </div>
            </section>

            <!-- Dropdown Demo -->
            <section>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Dropdown</h2>
                <x-halo::dropdown>
                    <x-slot:trigger>
                        <x-halo::button variant="outline" icon="chevron-down">
                            Options
                        </x-halo::button>
                    </x-slot:trigger>

                    <x-halo::dropdown.item icon="edit">
                        Edit
                    </x-halo::dropdown.item>

                    <x-halo::dropdown.item icon="copy">
                        Duplicate
                    </x-halo::dropdown.item>

                    <x-halo::dropdown.item icon="trash" :destructive="true">
                        Delete
                    </x-halo::dropdown.item>
                </x-halo::dropdown>
            </section>

        </div>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- HaloUI Init -->
    <script src="{{ asset('vendor/halo-ui/js/init.js') }}"></script>
</body>
</html>
