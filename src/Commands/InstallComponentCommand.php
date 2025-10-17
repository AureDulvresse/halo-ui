<?php

namespace Flux\UI\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallComponentCommand extends Command
{
    protected $signature = 'flux:install {component : Component name} {--force : Overwrite existing component}';
    protected $description = 'Install one or more FluxUI components into your Laravel project.';

    public function handle(): void
    {
        $component = $this->argument('component');
        $sourceBase = __DIR__ . '/../../stubs/components';
        $targetBase = resource_path('views/components/flux');

        if (!File::exists($targetBase)) {
            File::makeDirectory($targetBase, 0755, true);
        }

        if ($component) {
            $componentLower = strtolower($component);
            $sourceDir = $sourceBase . '/' . $componentLower;
            $files = [];

            // Case 1: folder exists
            if (File::exists($sourceDir) && File::isDirectory($sourceDir)) {
                $files = File::allFiles($sourceDir);
            }
            // Case 2: file exists directly in stubs/components
            elseif (File::exists($sourceBase . '/' . $componentLower . '.blade.php')) {
                $files[] = new \SplFileInfo($sourceBase . '/' . $componentLower . '.blade.php');
            } else {
                $this->error("❌ Component [{$component}] not found in stubs.");
                return;
            }

            $targetDir = $targetBase . '/' . $componentLower;
            File::ensureDirectoryExists($targetDir);

            foreach ($files as $file) {
                $targetFile = $targetDir . '/' . $file->getFilename();
                if (File::exists($targetFile) && !$this->option('force')) {
                    if (!$this->output->confirm("⚠️ {$file->getFilename()} already exists. Overwrite?")) {
                        continue;
                    }
                }
                File::copy($file->getPathname(), $targetFile);
                $this->info("✅ Installed [{$file->getFilename()}] for component [{$component}]!");
            }
        } else {
            // Install all components
            foreach (File::directories($sourceBase) as $dir) {
                $name = basename($dir);
                $this->call('flux:install', ['component' => $name, '--force' => $this->option('force')]);
            }

            foreach (File::files($sourceBase) as $file) {
                $name = pathinfo($file, PATHINFO_FILENAME);
                $this->call('flux:install', ['component' => $name, '--force' => $this->option('force')]);
            }
        }
    }
}
