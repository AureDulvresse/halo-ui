<?php

namespace Halo\UI\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'halo:install
                            {components?* : Specific components to install}
                            {--all : Install all components}
                            {--force : Overwrite existing files}
                            {--no-assets : Skip asset publishing}
                            {--only : Install only specified components without dependencies}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install HaloUI components into your Laravel application';

    /**
     * Filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->displayBanner();
        $this->newLine();

        // Publish config
        $this->publishConfig();

        // Publish assets unless skipped
        if (! $this->option('no-assets')) {
            $this->publishAssets();
        }

        // Publish icons
        $this->publishIcons();

        // Install components
        if ($this->option('all')) {
            $this->installAllComponents();
        } elseif ($components = $this->argument('components')) {
            $this->installSpecificComponents($components);
        } else {
            $this->installAllComponents();
        }

        $this->newLine();
        $this->info('HaloUI installed successfully!');
        $this->newLine();
        $this->line('Next steps:');
        $this->line('  1. Include Alpine.js in your layout: <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>');
        $this->line('  2. Include HaloUI init script: <script src="{{ asset(\'vendor/halo-ui/js/init.js\') }}"></script>');
        $this->line('  3. Ensure Tailwind is configured to scan HaloUI components');
        $this->newLine();

        return self::SUCCESS;
    }

    /**
     * Publish configuration file.
     */
    protected function publishConfig(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'halo-config',
            '--force' => $this->option('force'),
        ]);

        $this->info('✓ Config published');
    }

    /**
     * Publish assets (JS + CSS).
     */
    protected function publishAssets(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'halo-assets',
            '--force' => $this->option('force'),
        ]);

        $this->info('✓ Assets published');
    }

    /**
     * Publish icon set.
     */
    protected function publishIcons(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'halo-icons',
            '--force' => $this->option('force'),
        ]);

        $this->info('✓ Icons published');
    }

    /**
     * Install all components.
     */
    protected function installAllComponents(): void
    {
        $stubsPath = __DIR__.'/../../stubs/components';
        $targetPath = resource_path('views/components/halo');

        if (! $this->files->isDirectory($stubsPath)) {
            $this->error('Stubs directory not found');
            return;
        }

        $this->files->ensureDirectoryExists($targetPath);

        $this->copyDirectory($stubsPath, $targetPath);

        $this->info('✓ All components installed');
    }

    /**
     * Install specific components.
     */
    protected function installSpecificComponents(array $components): void
    {
        $stubsPath = __DIR__.'/../../stubs/components';
        $targetPath = resource_path('views/components/halo');

        $this->files->ensureDirectoryExists($targetPath);

        foreach ($components as $component) {
            $componentName = Str::kebab($component);
            $sourcePath = "{$stubsPath}/{$componentName}";
            $sourceFile = "{$stubsPath}/{$componentName}.blade.php";
            $destinationPath = "{$targetPath}/{$componentName}";
            $destinationFile = "{$targetPath}/{$componentName}.blade.php";

            // Check if component is modular (directory) or simple (single file)
            if ($this->files->isDirectory($sourcePath)) {
                $this->copyDirectory($sourcePath, $destinationPath);
                $this->info("✓ {$componentName} (modular) installed");
            } elseif ($this->files->exists($sourceFile)) {
                $this->files->copy($sourceFile, $destinationFile);
                $this->info("✓ {$componentName} installed");
            } else {
                $this->warn("✗ {$componentName} not found");
            }
        }
    }

    /**
     * Copy directory recursively.
     */
    protected function copyDirectory(string $source, string $destination): void
    {
        $this->files->ensureDirectoryExists($destination);

        foreach ($this->files->allFiles($source) as $file) {
            $relativePath = $file->getRelativePathname();
            $targetFile = $destination.'/'.$relativePath;

            $this->files->ensureDirectoryExists(dirname($targetFile));

            if ($this->option('force') || ! $this->files->exists($targetFile)) {
                $this->files->copy($file->getPathname(), $targetFile);
            }
        }
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

}
