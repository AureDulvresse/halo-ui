<?php

namespace Halo\UI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'halo:install
                            {components?* : Specific components to install (optional)}
                            {--all : Install all components}
                            {--force : Overwrite existing components}';

    protected $description = 'Install HaloUI components into your project';

    protected array $availableComponents = [
        'alert', 'badge', 'breadcrumb', 'breadcrumb-item', 'button',
        'card', 'checkbox', 'dropdown', 'input', 'modal',
        'navbar', 'pagination', 'radio', 'select', 'sidebar',
        'spinner', 'tab', 'table', 'textarea', 'toast', 'tooltip'
    ];

    protected array $modularComponents = [
        'card' => ['index', 'header', 'body', 'footer'],
        'dropdown' => ['index', 'item'],
        'modal' => ['index', 'header', 'body', 'footer'],
        'select' => ['index', 'item'],
        'tab' => ['index', 'item'],
        'table' => ['index', 'row', 'cell'],
    ];

    public function handle(): int
    {
        $this->info('🎨 HaloUI Component Installer');
        $this->newLine();

        // Determine which components to install
        $componentsToInstall = $this->determineComponents();

        if (empty($componentsToInstall)) {
            $this->error('No components specified. Use --all or specify component names.');
            return self::FAILURE;
        }

        // Ensure destination directory exists
        $destinationPath = resource_path('views/components/halo');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $installed = 0;
        $skipped = 0;

        foreach ($componentsToInstall as $component) {
            if ($this->installComponent($component, $destinationPath)) {
                $installed++;
            } else {
                $skipped++;
            }
        }

        $this->newLine();
        $this->info("✅ Installed: {$installed} component(s)");

        if ($skipped > 0) {
            $this->warn("⏭️  Skipped: {$skipped} component(s) (already exists, use --force to overwrite)");
        }

        $this->newLine();
        $this->info('📚 Next steps:');
        $this->line('  1. Make sure Alpine.js is installed: npm install alpinejs');
        $this->line('  2. Import HaloUI JS: <script src="{{ asset(\'vendor/halo-ui/halo.js\') }}"></script>');
        $this->line('  3. Customize components in: resources/views/components/halo/');
        $this->line('  4. Read docs: https://github.com/AureDulvresse/halo-ui');

        return self::SUCCESS;
    }

    protected function determineComponents(): array
    {
        if ($this->option('all')) {
            return $this->availableComponents;
        }

        $requested = $this->argument('components');

        if (empty($requested)) {
            return [];
        }

        // Validate requested components
        $invalid = array_diff($requested, $this->availableComponents);

        if (!empty($invalid)) {
            $this->warn('Invalid component(s): ' . implode(', ', $invalid));
            $this->line('Available: ' . implode(', ', $this->availableComponents));
        }

        return array_intersect($requested, $this->availableComponents);
    }

    protected function installComponent(string $component, string $destinationPath): bool
    {
        $stubsPath = __DIR__ . '/../../stubs/components';
        $force = $this->option('force');

        // Check if this is a modular component
        if (isset($this->modularComponents[$component])) {
            return $this->installModularComponent($component, $stubsPath, $destinationPath, $force);
        }

        return $this->installSimpleComponent($component, $stubsPath, $destinationPath, $force);
    }

    protected function installSimpleComponent(string $component, string $stubsPath, string $destinationPath, bool $force): bool
    {
        $sourceFile = "{$stubsPath}/{$component}.blade.php";
        $destinationFile = "{$destinationPath}/{$component}.blade.php";

        if (!File::exists($sourceFile)) {
            $this->error("❌ Source file not found: {$component}.blade.php");
            return false;
        }

        if (File::exists($destinationFile) && !$force) {
            $this->warn("⏭️  Skipped: {$component} (already exists)");
            return false;
        }

        File::copy($sourceFile, $destinationFile);
        $this->line("✅ Installed: {$component}");

        return true;
    }

    protected function installModularComponent(string $component, string $stubsPath, string $destinationPath, bool $force): bool
    {
        $sourceDir = "{$stubsPath}/{$component}";
        $destinationDir = "{$destinationPath}/{$component}";

        if (!File::isDirectory($sourceDir)) {
            $this->error("❌ Source directory not found: {$component}/");
            return false;
        }

        if (File::exists($destinationDir) && !$force) {
            $this->warn("⏭️  Skipped: {$component}/ (already exists)");
            return false;
        }

        // Create destination directory
        if (!File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        // Copy all files
        $files = File::files($sourceDir);
        foreach ($files as $file) {
            File::copy(
                $file->getPathname(),
                "{$destinationDir}/{$file->getFilename()}"
            );
        }

        $this->line("✅ Installed: {$component}/ (" . count($files) . " files)");

        return true;
    }
}
