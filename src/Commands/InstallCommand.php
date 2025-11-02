<?php

declare(strict_types=1);

namespace Halo\UI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'halo:install 
                            {components?* : Specific components to install}
                            {--all : Install all components}
                            {--force : Overwrite existing components}
                            {--with-templates : Install pre-built templates}
                            {--skip-deps : Skip dependency installation}';

    protected $description = 'Install HaloUI components into your project';

    /**
     * All available components (v2.1 - 49 components).
     */
    protected array $availableComponents = [
        // Form Components (8)
        'button', 'input', 'textarea', 'select', 'checkbox', 'radio', 'toggle', 'rating',
        
        // Advanced Form Components (6)
        'file-upload', 'date-picker', 'time-picker', 'rich-text', 'color-picker', 'slider-range',
        
        // Layout Components (7)
        'card', 'modal', 'navbar', 'sidebar', 'breadcrumb', 'accordion', 'bottom-sheet',
        
        // Feedback Components (8)
        'alert', 'toast', 'badge', 'spinner', 'progress', 'skeleton', 'empty-state', 'notification',
        
        // Navigation Components (5)
        'dropdown', 'tab', 'pagination', 'timeline', 'stepper',
        
        // Data Display & Utilities (11)
        'table', 'tooltip', 'avatar', 'avatar-group', 'divider', 'stats', 'chip', 'kbd', 
        'code', 'popover', 'breadcrumb-item',
        
        // Advanced Components (9)
        'context-menu', 'command-palette', 'carousel', 'calendar', 'image-cropper', 
        'tree-view', 'kanban', 'icon', 'select-item',
    ];

    /**
     * Modular components with subcomponents.
     */
    protected array $modularComponents = [
        'card' => ['index', 'header', 'body', 'footer'],
        'dropdown' => ['index', 'item'],
        'modal' => ['index', 'header', 'body', 'footer'],
        'select' => ['index', 'item'],
        'tab' => ['index', 'item'],
        'table' => ['index', 'row', 'cell'],
        'accordion' => ['index', 'item'],
        'timeline' => ['index', 'item'],
        'stepper' => ['index', 'item'],
        'context-menu' => ['index', 'item'],
        'kanban' => ['index', 'column', 'card'],
    ];

    /**
     * Component dependencies.
     */
    protected array $componentDependencies = [
        'date-picker' => ['calendar', 'input'],
        'file-upload' => ['button'],
        'stepper' => ['button'],
        'kanban' => ['card'],
        'avatar-group' => ['avatar'],
        'dropdown' => ['button'],
        'context-menu' => ['dropdown'],
    ];

    public function handle(): int
    {
        $this->displayBanner();

        $componentsToInstall = $this->determineComponents();

        if (empty($componentsToInstall)) {
            $this->error('❌ No components specified. Use --all or specify component names.');
            $this->info('💡 Available components: ' . implode(', ', $this->availableComponents));
            return self::FAILURE;
        }

        // Resolve dependencies
        if (!$this->option('skip-deps')) {
            $componentsToInstall = $this->resolveDependencies($componentsToInstall);
        }

        $destinationPath = resource_path('views/components/halo');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $installed = 0;
        $skipped = 0;

        $progressBar = $this->output->createProgressBar(count($componentsToInstall));
        $progressBar->start();

        foreach ($componentsToInstall as $component) {
            if ($this->installComponent($component, $destinationPath)) {
                $installed++;
            } else {
                $skipped++;
            }
            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine(2);

        $this->displaySummary($installed, $skipped);

        if ($this->option('with-templates')) {
            $this->installTemplates();
        }

        $this->displayNextSteps();

        return self::SUCCESS;
    }

    protected function displayBanner(): void
    {
        $this->newLine();
        $this->line('╔═══════════════════════════════════════════╗');
        $this->line('║   HaloUI v3.0 Component Installer         ║');
        $this->line('║   Modern UI Components for Laravel        ║');
        $this->line('╚═══════════════════════════════════════════╝');
        $this->newLine();
    }

    protected function determineComponents(): array
    {
        if ($this->option('all')) {
            $this->info('📦 Installing all ' . count($this->availableComponents) . ' components...');
            return $this->availableComponents;
        }

        $requested = $this->argument('components');

        if (empty($requested)) {
            return $this->interactiveSelection();
        }

        $invalid = array_diff($requested, $this->availableComponents);

        if (!empty($invalid)) {
            $this->warn('⚠️  Invalid component(s): ' . implode(', ', $invalid));
            $this->line('Available components:');
            $this->displayComponentList();
        }

        return array_intersect($requested, $this->availableComponents);
    }

    protected function interactiveSelection(): array
    {
        $this->info('🎯 Interactive component selection:');
        $this->newLine();

        $categories = [
            'Form Components' => ['button', 'input', 'textarea', 'select', 'checkbox', 'radio', 'toggle', 'rating'],
            'Advanced Forms' => ['file-upload', 'date-picker', 'time-picker', 'rich-text', 'color-picker', 'slider-range'],
            'Layout' => ['card', 'modal', 'navbar', 'sidebar', 'breadcrumb', 'accordion', 'bottom-sheet'],
            'Feedback' => ['alert', 'toast', 'badge', 'spinner', 'progress', 'skeleton', 'empty-state', 'notification'],
            'Navigation' => ['dropdown', 'tab', 'pagination', 'timeline', 'stepper'],
        ];

        $selected = [];

        foreach ($categories as $category => $components) {
            if ($this->confirm("Install {$category} components?", true)) {
                $selected = array_merge($selected, $components);
            }
        }

        return $selected;
    }

    protected function resolveDependencies(array $components): array
    {
        $resolved = $components;

        foreach ($components as $component) {
            if (isset($this->componentDependencies[$component])) {
                $deps = $this->componentDependencies[$component];
                $this->info("📌 Component '{$component}' requires: " . implode(', ', $deps));
                $resolved = array_merge($resolved, $deps);
            }
        }

        return array_unique($resolved);
    }

    protected function installComponent(string $component, string $destinationPath): bool
    {
        $stubsPath = __DIR__ . '/../../stubs/components';
        $force = $this->option('force');

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
            return false;
        }

        File::copy($sourceFile, $destinationFile);
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
            return false;
        }

        if (!File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        $files = File::files($sourceDir);
        foreach ($files as $file) {
            File::copy(
                $file->getPathname(),
                "{$destinationDir}/{$file->getFilename()}"
            );
        }

        return true;
    }

    protected function installTemplates(): void
    {
        $this->newLine();
        $this->info('📄 Installing pre-built templates...');

        $templates = ['auth/login', 'auth/register', 'landing/hero', 'admin/dashboard'];

        foreach ($templates as $template) {
            $this->line("  ✓ {$template}");
        }

        $this->call('vendor:publish', ['--tag' => 'halo-templates', '--force' => $this->option('force')]);
    }

    protected function displaySummary(int $installed, int $skipped): void
    {
        $this->info("✅ Installed: {$installed} component(s)");

        if ($skipped > 0) {
            $this->warn("⏭️  Skipped: {$skipped} component(s) (already exists, use --force to overwrite)");
        }
    }

    protected function displayNextSteps(): void
    {
        $this->newLine();
        $this->info('📚 Next steps:');
        $this->line('  1. Install Alpine.js: npm install alpinejs');
        $this->line('  2. Import HaloUI JS: <script src="{{ asset(\'vendor/halo-ui/js/halo.js\') }}"></script>');
        $this->line('  3. Configure Tailwind: Add HaloUI paths to tailwind.config.js');
        $this->line('  4. Customize components: resources/views/components/halo/');
        $this->line('  5. Read docs: https://github.com/AureDulvresse/halo-ui/docs');
        $this->newLine();
    } 

    protected function displayComponentList(): void
    {
        $categories = [
            'Form' => array_slice($this->availableComponents, 0, 8),
            'Layout' => array_slice($this->availableComponents, 8, 7),
            'Feedback' => array_slice($this->availableComponents, 15, 8),
            'Data' => array_slice($this->availableComponents, 23, 11),
        ];

        foreach ($categories as $category => $components) {
            $this->line("  {$category}: " . implode(', ', $components));
        }
    }
}