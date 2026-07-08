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
                            {components?* : Specific components to eject}
                            {--all : Eject all components}
                            {--force : Overwrite existing files}
                            {--no-assets : Skip asset publishing}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eject an editable copy of HaloUI components into your Laravel application';

    /**
     * Filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $this->displayBanner();
        $this->newLine();

        $this->publishConfig();

        if (! $this->option('no-assets')) {
            $this->publishAssets();
        }

        $this->publishIcons();

        if ($this->option('all')) {
            $this->installAllComponents();
        } elseif ($components = $this->argument('components')) {
            $this->installSpecificComponents($components);
        } else {
            $this->installAllComponents();
        }

        $this->newLine();
        $this->info('HaloUI components ejected into resources/views/components/halo — customize freely.');
        $this->newLine();

        return self::SUCCESS;
    }

    protected function publishConfig(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'halo-config',
            '--force' => $this->option('force'),
        ]);

        $this->info('✓ Config published');
    }

    protected function publishAssets(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'halo-assets',
            '--force' => $this->option('force'),
        ]);

        $this->info('✓ Assets published');
    }

    protected function publishIcons(): void
    {
        $this->call('vendor:publish', [
            '--tag' => 'halo-icons',
            '--force' => $this->option('force'),
        ]);

        $this->info('✓ Icons published');
    }

    /**
     * Eject every component from the package's own component tree into the
     * consuming app. Source and destination are always different absolute
     * paths (vendor/ vs the app's resources/), so this never overwrites itself.
     */
    protected function installAllComponents(): void
    {
        $sourcePath = __DIR__.'/../../resources/views/components/halo';
        $targetPath = resource_path('views/components/halo');

        if (! $this->files->isDirectory($sourcePath)) {
            $this->error('Component source directory not found');

            return;
        }

        $this->copyDirectory($sourcePath, $targetPath);

        $this->info('✓ All components ejected');
    }

    protected function installSpecificComponents(array $components): void
    {
        $sourcePath = __DIR__.'/../../resources/views/components/halo';
        $targetPath = resource_path('views/components/halo');

        $this->files->ensureDirectoryExists($targetPath);

        foreach ($components as $component) {
            $componentName = Str::kebab($component);
            $sourceDir = "{$sourcePath}/{$componentName}";
            $sourceFile = "{$sourcePath}/{$componentName}.blade.php";
            $destinationDir = "{$targetPath}/{$componentName}";
            $destinationFile = "{$targetPath}/{$componentName}.blade.php";

            if ($this->files->isDirectory($sourceDir)) {
                $this->copyDirectory($sourceDir, $destinationDir);
                $this->info("✓ {$componentName} (modular) ejected");
            } elseif ($this->files->exists($sourceFile)) {
                $this->files->copy($sourceFile, $destinationFile);
                $this->info("✓ {$componentName} ejected");
            } else {
                $this->warn("✗ {$componentName} not found");
            }
        }
    }

    protected function copyDirectory(string $source, string $destination): void
    {
        $this->files->ensureDirectoryExists($destination);

        foreach ($this->files->allFiles($source) as $file) {
            $targetFile = $destination.'/'.$file->getRelativePathname();

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
        $this->line('║   HaloUI v4 Component Installer            ║');
        $this->line('║   Modern UI Components for Laravel         ║');
        $this->line('╚═══════════════════════════════════════════╝');
        $this->newLine();
    }
}
